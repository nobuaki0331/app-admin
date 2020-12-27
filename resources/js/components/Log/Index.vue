<template>
  <div>
    <h1>ここはLOGページ</h1>
    <v-btn @click="onClickedCsvDownload">CSV出力</v-btn>
    {{ data.message }}
  </div>
</template>

<script>
import { reactive } from '@vue/composition-api'
import downloadFile from '../../Logic/download'

export default {
  name: 'LogIndex',
  setup: () => {
    const data = reactive({
      message: "hogehoge"
    })
    const onClickedCsvDownload = () => console.log(data.message)
    return {
      data,
      onClickedCsvDownload,
    }
  },
}
</script>
