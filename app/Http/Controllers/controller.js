// ============================================
// Activity Log Controller
// ============================================

import { supabase } from './supabase-client.js'

class ActivityLogController {
  
  /**
   * Ambil semua activity logs
   */
  static async getAllActivityLogs() {
    try {
      console.log('📥 Fetching all activity logs...')
      
      const { data, error } = await supabase
        .from('activity_logs')
        .select(`
          id,
          description,
          detail,
          created_at,
          user_id,
          users:user_id (
            id,
            username,
            email,
            full_name
          )
        `)
        .order('created_at', { ascending: false })

      if (error) {
        console.error('❌ Query error:', error.message)
        return { success: false, error: error.message, data: [] }
      }

      console.log('✅ Fetched:', data.length, 'logs')
      return { success: true, data: data }
      
    } catch (error) {
      console.error('❌ Error:', error.message)
      return { success: false, error: error.message, data: [] }
    }
  }

  /**
   * Cari activity logs dengan search term
   */
  static async searchActivityLogs(searchTerm) {
    try {
      if (!searchTerm) {
        return this.getAllActivityLogs()
      }

      console.log('🔍 Searching for:', searchTerm)

      const { data, error } = await supabase
        .from('activity_logs')
        .select(`
          id,
          description,
          detail,
          created_at,
          user_id,
          users:user_id (
            id,
            username,
            email,
            full_name
          )
        `)
        .ilike('description', `%${searchTerm}%`)
        .order('created_at', { ascending: false })

      if (error) {
        console.error('❌ Search error:', error.message)
        return { success: false, error: error.message, data: [] }
      }

      console.log('✅ Found:', data.length, 'results')
      return { success: true, data: data }
      
    } catch (error) {
      console.error('❌ Error:', error.message)
      return { success: false, error: error.message, data: [] }
    }
  }

  /**
   * Hapus activity log
   */
  static async deleteActivityLog(id) {
    try {
      console.log('🗑️ Deleting log ID:', id)

      if (!id) {
        throw new Error('ID is required')
      }

      const { error } = await supabase
        .from('activity_logs')
        .delete()
        .eq('id', id)

      if (error) {
        console.error('❌ Delete error:', error.message)
        return { success: false, error: error.message }
      }

      console.log('✅ Log deleted successfully')
      return { success: true, message: 'Activity log berhasil dihapus' }
      
    } catch (error) {
      console.error('❌ Error:', error.message)
      return { success: false, error: error.message }
    }
  }

  /**
   * Tambah activity log baru
   */
  static async addActivityLog(logData) {
    try {
      console.log('➕ Adding new activity log...')

      if (!logData.description) {
        return { success: false, error: 'Description is required' }
      }

      const { data, error } = await supabase
        .from('activity_logs')
        .insert([
          {
            user_id: logData.user_id || null,
            description: logData.description,
            detail: logData.detail || null,
            created_at: new Date().toISOString()
          }
        ])
        .select()

      if (error) {
        console.error('❌ Insert error:', error.message)
        return { success: false, error: error.message }
      }

      console.log('✅ Activity log added:', data)
      return { success: true, data: data[0] }
      
    } catch (error) {
      console.error('❌ Error:', error.message)
      return { success: false, error: error.message }
    }
  }

  /**
   * Update activity log
   */
  static async updateActivityLog(id, updates) {
    try {
      console.log('✏️ Updating log ID:', id)

      if (!id) {
        return { success: false, error: 'ID is required' }
      }

      const { data, error } = await supabase
        .from('activity_logs')
        .update(updates)
        .eq('id', id)
        .select()

      if (error) {
        console.error('❌ Update error:', error.message)
        return { success: false, error: error.message }
      }

      console.log('✅ Log updated:', data)
      return { success: true, data: data[0] }
      
    } catch (error) {
      console.error('❌ Error:', error.message)
      return { success: false, error: error.message }
    }
  }

  /**
   * Get statistics
   */
  static async getStatistics() {
    try {
      console.log('📊 Fetching statistics...')

      const { data, error } = await supabase
        .from('activity_logs')
        .select('id, user_id')

      if (error) {
        console.error('❌ Stats error:', error.message)
        return { success: false, error: error.message }
      }

      const totalLogs = data.length
      const uniqueUsers = new Set(data.map(log => log.user_id)).size

      const stats = {
        total_logs: totalLogs,
        unique_users: uniqueUsers
      }

      console.log('✅ Statistics:', stats)
      return { success: true, data: stats }
      
    } catch (error) {
      console.error('❌ Error:', error.message)
      return { success: false, error: error.message }
    }
  }
}

export default ActivityLogController