// ============================================
// Supabase Client Configuration
// File: assets/js/supabase-client.js
// ============================================

import { createClient } from 'https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2/+esm'

// ✅ Credentials Supabase Anda (sudah diisi)
const SUPABASE_URL = "https://mybfahpmnpasjmhutmcr.supabase.co"
const SUPABASE_ANON_KEY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NjEzMjg1MDgsImV4cCI6MjA3NjkwNDUwOH0.E_VI8-raJ3jRPAQc079j6jAhluiC4lSCmtIN9gMND6g"

// Buat Supabase client
export const supabase = createClient(SUPABASE_URL, SUPABASE_ANON_KEY)

// Function untuk test koneksi
export async function testConnection() {
  try {
    console.log('🔄 Testing connection to Supabase...')
    console.log('📍 URL:', SUPABASE_URL)
    
    const { data, error } = await supabase
      .from('activity_logs')
      .select('id')
      .limit(1)
    
    if (error) {
      console.error('❌ Koneksi gagal:', error.message)
      return false
    }
    
    console.log('✅ Koneksi Supabase berhasil!')
    console.log('📊 Data tersedia:', data ? 'Ya' : 'Tidak')
    return true
    
  } catch (err) {
    console.error('❌ Error koneksi:', err)
    return false
  }
}

// Auto test saat load
console.log('📦 Supabase client loaded')
console.log('🔗 Connected to:', SUPABASE_URL)