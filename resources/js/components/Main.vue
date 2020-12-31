<template>
  <v-card style="padding-bottom: 20px;">
    <v-card-title class="font-weight-bold">
      <v-icon>mdi-home</v-icon>
      管理トップ
    </v-card-title>
    <h5 class="mt-5 pl-10 grey--text text--darken-2 font-weight-bold">ログインユーザー情報</h5>
    <v-card style="margin: 30px auto; max-width: 800px;">
      <v-row>
        <v-col
          cols="3"
          offset="1">
          名前
        </v-col>
        <v-col
          cols="6">
          {{ data.user.name }}
        </v-col>
      </v-row>
      <v-row>
        <v-col
          cols="3"
          offset="1">
          メールアドレス
        </v-col>
        <v-col
          cols="6">
          {{ data.user.email }}
        </v-col>
      </v-row>
      <v-row>
        <v-col
          cols="3"
          offset="1">
          住所
        </v-col>
        <v-col
          cols="6">
          {{ data.user.address || '未登録' }}
        </v-col>
      </v-row>
      <v-row>
        <v-col
          cols="3"
          offset="1">
          電話番号
        </v-col>
        <v-col
          cols="6">
          {{ data.user.tel || '未登録' }}
        </v-col>
      </v-row>
      <v-row>
        <v-col
          cols="3"
          offset="1">
          ブロック
        </v-col>
        <v-col
          cols="6">
          {{ data.user.name || '未登録' }}
        </v-col>
      </v-row>
      <v-row>
        <v-col
          cols="3"
          offset="1">
          権限
        </v-col>
        <v-col
          cols="6">
          {{ Number(data.user.permission) === 0 ? '権限なし' : '権限あり' }}
        </v-col>
      </v-row>
    </v-card>
    <!-- お知らせ -->
    <h5 class="mt-10 pl-10 grey--text text--darken-2 font-weight-bold">お知らせ</h5>
    <v-card style="margin: 15px auto; max-width: 800px;">
      <div
        v-for="(n, i) in 4"
        :key="i"
        class="information-content">
        <div class="information-box">
          <div class="information-title">新着情報</div>
          <div class="information-text">ホゲホゲホゲホゲ</div>
        </div>
      </div>
    </v-card>
  </v-card>
</template>

<script>
import { computed, reactive } from '@vue/composition-api'

export default {
  name: 'MainContainer',
  setup: () => {
    const data = reactive({
      user: '',
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
      console.log(token)
      const { data } = await axios.get(`/api/user?api_token=${token}`)
      console.log(data)
      this.data.user = data
    }
  }


}
</script>

<style scoped>
.information-content {
  border-bottom: 1px solid silver;
}
.information-box {
  display: flex;
  justify-content:space-between;
  width: 40%;
  height: 50px;
  padding: 15px;
}
.information-title {
  color: red;
}
</style>
