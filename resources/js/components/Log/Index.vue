<template>
  <div>
    <h1>ここはLOGページ</h1>
    <v-btn @click="onClickedCsvDownload">CSV出力</v-btn>
  </div>
</template>

<script>
import downloadFile from '../../Logic/download'

export default {
  name: 'LogIndex',
  data() {
    return {}
  },
  methods: {
    onClickedCsvDownload() {
      downloadFile('api/log/playlog')
    },
  },
}
</script>
