import { createClient } from '@supabase/supabase-js'

// Masukkan data dari dashboard Supabase
const SUPABASE_URL = 'https://mybfahpmnpasjmhutmcr.supabase.co'
const SUPABASE_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NjEzMjg1MDgsImV4cCI6MjA3NjkwNDUwOH0.E_VI8-raJ3jRPAQc079j6jAhluiC4lSCmtIN9gMND6g'

// Buat koneksi ke Supabase
const supabase = createClient(SUPABASE_URL, SUPABASE_KEY)

// Contoh: ambil data dari tabel "users"
async function getUsers() {
  const { data, error } = await supabase.from('users').select('*')
  if (error) {
    console.error('Error:', error.message)
  } else {
    console.log('Data:', data)
  }
}

getUsers()

try {
  const { data, error } = await supabase
    .from('users')
    .insert([
      { username: 'tes_user', email: 'tes_user@example.com', password_hash: 'abc123' }
    ])
  if (error) throw error
  console.log('✅ Data berhasil ditambahkan:', data)
} catch (err) {
  console.error('❌ Gagal insert:', err)
}
