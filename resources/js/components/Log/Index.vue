<template>
  <v-card>
    <v-card-title class="font-weight-bold">ログ管理(ユーザー登録日)</v-card-title>
    <v-row>
      <v-col
        cols="3"
        md="2"
        offset="1">
        <label class="label-position">開始日時</label>
      </v-col>
      <v-col
        cols="7"
        md="3">
        <date-picker v-model="data.startedAt" />
      </v-col>
      <v-col
        cols="3"
        md="2"
        offset="1"
        offset-md="0">
        <label class="label-position">終了日時</label>
      </v-col>
      <v-col
        cols="7"
        md="3">
        <date-picker v-model="data.finishedAt" />
      </v-col>
    </v-row>
    <v-row>
      <v-col
        cols="3"
        offset="1"
        class="pl-0">
        <v-btn
          color="primary"
          @click="onClickedCsvDownload">
          CSV出力
        </v-btn>
      </v-col>
    </v-row>
  </v-card>
</template>

<script>
import { reactive } from '@vue/composition-api'
import downloadFile from '../../Logic/download'
import DatePicker from '../Common/DatePicker'

export default {
  name: 'LogIndex',
  components: {
    DatePicker,
  },
  setup: () => {
    const data = reactive({
      startedAt: '',
      finishedAt: '',
    })
    return {
      data,
    }
  },
  methods: {
    onClickedCsvDownload() {
      const token = this.$store.state.token
      downloadFile(`api/log/playlog?api_token=${token}`, {
        params: {
          started_at: this.data.startedAt,
          finished_at: this.data.finishedAt
        }
      })
    }
  }
}
</script>

<style scoped>
.label-position {
  line-height: 3;
}
</style>
