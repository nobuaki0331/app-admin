<template>
  <v-data-table
    v-model="selected"
    :headers="headers"
    :items="users"
    :single-select="singleSelect"
    disable-sort
    item-key="name"
    show-select
    class="elevation-1">
    <template v-slot:top>
      <v-switch
        v-model="singleSelect"
        label="Single select"
        class="pa-3" />
    </template>
  </v-data-table>
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
        {　text: '権限',　align: 'center',　value: 'permission'},
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
      const  { data }  = await axios.get(`api/account?api_token=${token}`)
      this.users = data
    },
  }
}
</script>

