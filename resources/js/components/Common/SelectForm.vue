<template>
  <v-row class="mt-2 pa-0">
    <v-col
      cols="2"
      offset="1">
      <label class="label-position">{{ $attrs.label }}</label>
    </v-col>
    <v-col
      :cols="columnSize">
      <v-select
        :items="items"
        item-text="name"
        item-value="value"
        outlined
        dense
        v-on="$listeners" />
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: 'SelectForm',
  props: {
    columnSize: {
      type: String,
      default: '4'
    },
  },
  data () {
    return {
      items: [],
    }
  },
  mounted() {
    this.fetchItems()
  },
  methods: {
    async fetchItems() {
      const token = this.$store.state.token
      const { data } = await axios.get(`/api/prefectures?api_token=${token}`)
      this.items = [{ id: '', name: '-- 選択してください--'}, ...data]
    }

  }
}
</script>

<style scoped>
.label-position {
  line-height: 3;
  font-weight: bold;
}
</style>
