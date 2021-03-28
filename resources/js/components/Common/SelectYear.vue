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
        item-text="text"
        item-value="value"
        outlined
        dense />
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: 'SelectYear',
  props: {
    columnSize: {
      type: String,
      default: '4'
    },
  },
  data() {
    return {
      year: new Date().getFullYear(),
      items: [{ text: 'なし/不明', value: null }],
    }
  },
  mounted() {
    this.configureYears()
  },
  methods: {
    configureYears() {
      for (let i = this.year; i >= 1912; i -= 1) {
        let era = ''
        if (i >= 2019) {
          era = `令和${i === 2019 ? '元年' : `${i - 2018}年`}`
        } else if (i >= 1989) {
          era = `平成${i === 1989 ? '元年' : `${i - 1988}年`}`
        } else if (i >= 1926) {
          era = `昭和${i === 1926 ? '元年' : `${i - 1925}年`}`
        } else if (i >= 1912) {
          era = `大正${i === 1912 ? '元年' : `${i - 1911}年`}`
        }
        this.items.push({
          text: `${i}年(${era})`,
          value: `${i}`,
        })
      }
    },
  },
}
</script>

<style scoped>
.v-input {
  margin: 2px 0 !important;
}
.label-position {
  line-height: 3;
  font-weight: bold;
}
</style>

