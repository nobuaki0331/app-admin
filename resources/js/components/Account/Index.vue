<template>
  <div>
    <v-data-table
      v-model="data.selected"
      :headers="data.headers"
      :items="data.users"
      :single-select="data.singleSelect"
      disable-sort
      item-key="name"
      show-select
      class="elevation-1">
      <template #top>
        <v-row dense>
          <v-col
            cols="12"
            sm="2">
            <v-switch
              v-model="data.singleSelect"
              dense
              class="pl-2" />
          </v-col>
          <v-col
            cols="6"
            sm="5"
            md="4">
            <div class="ml-1 pt-5">
              <v-text-field
                v-model="data.searchData"
                label="Search"
                hide-details
                dense
                outlined />
            </div>
          </v-col>
          <v-col
            cols="3"
            sm="2"
            md="1">
            <div class="pt-5 text-right">
              <v-btn
                color="success"
                @click="onSearchButtonClicked">
                <v-icon>mdi-magnify</v-icon>
              </v-btn>
            </div>
          </v-col>
          <v-col
            cols="3"
            sm="2"
            md="1">
            <div class="pt-5">
              <v-btn>初期化</v-btn>
            </div>
          </v-col>
          <v-spacer />
          <v-col
            cols="11"
            sm="6"
            md="3">
            <div  class="pl-1 pt-5">
              <v-btn
                class="mr-1"
                color="primary"
                @click="onAddButtonClicked">
                追加or編集
              </v-btn>
              <v-btn
                color="error"
                @click="onDeleteButtonClicked">
                削除
              </v-btn>
            </div>
          </v-col>
        </v-row>
      </template>
    </v-data-table>
  </div>
</template>

<script>
import { reactive } from '@vue/composition-api'

export default {
  setup: () => {
    const data = reactive({
      singleSelect: false,
      selected: [],
      headers: [
        {　text: '名前',　align: 'center',　value: 'name'},
        {　text: 'email',　align: 'center',　value: 'email'},
        {　text: '住所',　align: 'center',　value: 'address'},
        {　text: '電話番号',　align: 'center',　value: 'tel'},
        {　text: 'ブロック',　align: 'center',　value: 'prefecture.name'},
        {　text: '権限',　align: 'center',　value: 'permission_name'},
      ],
      users: [],
      searchData: '',
    })
    return {
      data,
    }
  },
  mounted() {
    this.fetchItem()
  },
  methods: {
    async fetchItem() {
      const token = this.$store.state.token
      const { data } = await axios.get(`/api/account?api_token=${token}`)
      this.data.users = data
    },
    onAddButtonClicked() {
      if (this.data.selected.length === 0) {
        this.$router.push({ name: 'account-new' })
      } else if(this.data.selected.length === 1){
        const userId = this.data.selected[0].id
        this.$router.push({ name: 'account-edit', params: { id: userId } })
      } else {
        alert('選択数を１つにしてください')
      }
    },
    async onDeleteButtonClicked() {
      const token = this.$store.state.token
      const selectedIds = this.data.selected.map(selectItem => {
        return selectItem.id
      })
      const response = await axios.delete(`/api/account?api_token=${token}`, {
        params: {
          ids: selectedIds
        }
      })

      this.fetchItem()
    },
    async onSearchButtonClicked() {
      const token = this.$store.state.token
      const searchData = this.data.searchData
      const { data } = await axios.get(`/api/account-search?api_token=${token}`, {
        params: {
          search: searchData
        }
      })

      this.data.users = data
    }
  }
}
</script>
