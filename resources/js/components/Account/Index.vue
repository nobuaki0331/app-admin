<template>
  <div>
    <v-data-table
      v-model="selected"
      :headers="headers"
      :items="users"
      :single-select="singleSelect"
      disable-sort
      item-key="name"
      show-select
      class="elevation-1">
      <template #top>
        <v-row dense>
          <v-col
            cols="2">
            <v-switch
              v-model="singleSelect"
              label="Single select"
              dense
              class="pl-2" />
          </v-col>
          <v-spacer />
          <v-col
            cols="11"
            sm="6"
            md="4"
            lg="3">
            <div  class="pl-1 pt-5">
              <v-btn class="mr-1">追加</v-btn>
              <v-btn class="mr-1">編集</v-btn>
              <v-btn>削除</v-btn>
            </div>
          </v-col>
        </v-row>
      </template>
    </v-data-table>
  </div>
</template>

<script>
export default {
  data () {
    return {
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
    }
  },
  mounted() {
    this.fetchItem()
  },
  methods: {
    async fetchItem() {
      const token = this.$store.state.token
      const { data } = await axios.get(`api/account?api_token=${token}`)
      this.users = data
    },
  }
}
</script>

