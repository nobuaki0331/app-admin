<template>
<div>
  <h1>ここはLOGページ</h1>
  <v-btn @click="hoge">hoge</v-btn>
</div>
</template>

<script>
export default {
  name: 'LogIndex',
  data() {
    return {}
  },
  // mounted() {
  //   this.hoge()
  // },
  methods: {
    hoge() {
      console.log('hogehoge')
    },
  },
}
</script>
