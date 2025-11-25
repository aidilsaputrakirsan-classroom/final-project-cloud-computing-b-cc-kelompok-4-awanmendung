// ============================================
// Activity Log - Main JavaScript
// File: assets/js/activity_log.js
// ============================================

import { supabase, testConnection } from './supabase-client.js'

// ============================================
// MAIN: Load saat halaman ready
// ============================================
document.addEventListener('DOMContentLoaded', async () => {
  console.log('📄 Page loaded, initializing...')
  
  // Update status indicator
  updateStatus('Connecting...', 'text-warning')
  
  // Test koneksi dulu
  const isConnected = await testConnection()
  
  if (!isConnected) {
    updateStatus('Connection Failed', 'text-danger')
    showError('❌ Gagal terhubung ke database Supabase. Cek console untuk detail.')
    return
  }
  
  updateStatus('Connected to Supabase', 'text-success')
  
  // Load data activity logs
  await loadActivityLogs()
  
  // Setup event listeners
  setupEventListeners()
  setupDeleteConfirmation()
  
  console.log('✅ Initialization complete!')
})

// ============================================
// FUNCTION: Load Activity Logs dari Supabase
// ============================================
async function loadActivityLogs(searchTerm = '') {
  try {
    const tableBody = document.getElementById('resepTableBody')
    
    // Show loading
    tableBody.innerHTML = `
      <tr>
        <td colspan="5" class="text-center py-4">
          <div class="spinner-border spinner-border-sm text-primary me-2" role="status"></div>
          Memuat data dari Supabase...
        </td>
      </tr>
    `

    console.log('📥 Fetching activity logs...')

    // Query dengan join ke tabel users
    let query = supabase
      .from('activity_logs')
      .select(`
        id,
        description,
        detail,
        created_at,
        user_id,
        users:user_id (
          username,
          email,
          full_name
        )
      `)
      .order('created_at', { ascending: false })

    // Filter search jika ada
    if (searchTerm) {
      query = query.ilike('description', `%${searchTerm}%`)
    }

    const { data: logs, error } = await query

    if (error) {
      console.error('❌ Error query:', error)
      throw error
    }

    console.log('📊 Data received:', logs?.length || 0, 'rows')

    // Render data ke tabel
    if (logs && logs.length > 0) {
      tableBody.innerHTML = logs.map(log => `
        <tr>
          <td>
            <div class="d-flex px-2 py-1">
              <div>
                <div class="avatar avatar-sm me-3 bg-gradient-primary">
                  <span class="text-white text-xs">${getInitials(log.users?.username)}</span>
                </div>
              </div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm">${log.users?.username || 'Unknown'}</h6>
                <p class="text-xs text-secondary mb-0">${log.users?.email || '-'}</p>
              </div>
            </div>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0">${escapeHtml(log.description || '-')}</p>
          </td>
          <td class="text-center">
            <span class="text-secondary text-xs">
              ${formatDetail(log.detail)}
            </span>
          </td>
          <td class="align-middle text-center">
            <span class="text-xs font-weight-bold">${formatTimestamp(log.created_at)}</span>
          </td>
          <td class="align-middle text-center">
            <button class="btn btn-link text-danger text-gradient px-3 mb-0 btn-delete" 
                    data-id="${log.id}" 
                    data-description="${escapeHtml(log.description)}">
              <i class="far fa-trash-alt me-2"></i>Delete
            </button>
          </td>
        </tr>
      `).join('')

      // Setup delete buttons
      setupDeleteButtons()
      
    } else {
      tableBody.innerHTML = `
        <tr>
          <td colspan="5" class="text-center py-4 text-secondary">
            <i class="fas fa-inbox me-2"></i>
            Tidak ada data activity log
          </td>
        </tr>
      `
    }

  } catch (error) {
    console.error('❌ Error loading logs:', error)
    showError('Error loading data: ' + error.message)
  }
}

// ============================================
// HELPER: Format Functions
// ============================================

// Get initials dari username
function getInitials(name) {
  if (!name) return '?'
  return name.substring(0, 2).toUpperCase()
}

// Escape HTML untuk prevent XSS
function escapeHtml(text) {
  if (!text) return ''
  const div = document.createElement('div')
  div.textContent = text
  return div.innerHTML
}

// Format detail JSON
function formatDetail(detail) {
  if (!detail) return '-'
  
  try {
    if (typeof detail === 'string') {
      detail = JSON.parse(detail)
    }
    
    const entries = Object.entries(detail)
    if (entries.length === 0) return '-'
    
    return entries
      .slice(0, 2)
      .map(([key, value]) => `${key}: ${value}`)
      .join(', ')
      
  } catch (e) {
    return String(detail).substring(0, 50)
  }
}

// Format timestamp
function formatTimestamp(timestamp) {
  if (!timestamp) return '-'
  
  const date = new Date(timestamp)
  const options = {
    year: 'numeric',
    month: 'short',
    day: 'numeric',
    hour: '2-digit',
    minute: '2-digit'
  }
  
  return date.toLocaleDateString('id-ID', options)
}

// ============================================
// EVENT LISTENERS
// ============================================

function setupEventListeners() {
  // Search input
  const searchInput = document.getElementById('searchInput')
  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      const searchTerm = e.target.value
      loadActivityLogs(searchTerm)
    })
  }
}

// Setup delete buttons
function setupDeleteButtons() {
  document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', (e) => {
      const id = e.currentTarget.dataset.id
      const description = e.currentTarget.dataset.description
      
      // Set data ke modal
      document.getElementById('idResepHapus').value = id
      document.getElementById('namaResepHapus').textContent = description
      
      // Show modal
      const modal = new bootstrap.Modal(document.getElementById('modalHapusResep'))
      modal.show()
    })
  })
}

// Setup delete confirmation
function setupDeleteConfirmation() {
  const btnDelete = document.getElementById('btnHapusResepFinal')
  if (btnDelete) {
    btnDelete.addEventListener('click', handleDelete)
  }
}

// ============================================
// DELETE HANDLER
// ============================================

async function handleDelete() {
  const id = document.getElementById('idResepHapus').value
  const btn = document.getElementById('btnHapusResepFinal')
  
  // Disable button
  btn.disabled = true
  btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menghapus...'
  
  try {
    console.log('🗑️ Deleting log:', id)
    
    const { error } = await supabase
      .from('activity_logs')
      .delete()
      .eq('id', id)

    if (error) throw error

    console.log('✅ Delete success')

    // Close modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('modalHapusResep'))
    if (modal) modal.hide()

    // Reload data
    await loadActivityLogs()
    
    // Show success
    showSuccess('Activity log berhasil dihapus!')
    
  } catch (error) {
    console.error('❌ Error deleting:', error)
    alert('Gagal menghapus: ' + error.message)
  } finally {
    // Reset button
    btn.disabled = false
    btn.innerHTML = 'Hapus'
  }
}

// ============================================
// UI HELPERS
// ============================================

function updateStatus(text, className = 'text-secondary') {
  const indicator = document.getElementById('statusIndicator')
  if (indicator) {
    indicator.textContent = text
    indicator.className = `mb-0 ${className}`
  }
}

function showError(message) {
  const tableBody = document.getElementById('resepTableBody')
  tableBody.innerHTML = `
    <tr>
      <td colspan="5" class="text-center text-danger py-4">
        <i class="fas fa-exclamation-triangle me-2"></i>
        ${message}
      </td>
    </tr>
  `
}

function showSuccess(message) {
  // Simple toast notification
  const toast = document.createElement('div')
  toast.className = 'position-fixed top-0 end-0 p-3'
  toast.style.zIndex = '9999'
  toast.innerHTML = `
    <div class="toast show align-items-center text-white bg-success border-0" role="alert">
      <div class="d-flex">
        <div class="toast-body">
          <i class="fas fa-check-circle me-2"></i>${message}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" onclick="this.parentElement.parentElement.parentElement.remove()"></button>
      </div>
    </div>
  `
  document.body.appendChild(toast)
  
  setTimeout(() => toast.remove(), 3000)
}

console.log('✅ activity_log.js loaded')