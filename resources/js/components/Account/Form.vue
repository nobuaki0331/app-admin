<template>
  <v-card>
    <v-card-title
      class="font-weight-bold">
      {{ formTitle }}
      <span v-if="$route.params.id">
        ユーザーID:{{ $route.params.id }}
      </span>
    </v-card-title>
    <text-input
      v-model="data.form.name"
      label="名前" />
    <text-input
      v-model="data.form.email"
      label="メールアドレス" />
    <password-input
      v-model="data.form.password"
      label="パスワード" />
    <text-input
      v-model="data.form.address"
      column-size=8
      label="住所" />
    <text-input
      v-model="data.form.tel"
      label="電話番号" />
    <radio-form
      v-model="data.form.sex_code"
      :items="data.sexCodeItems"
      label="性別" />
    <radio-form
      v-model="data.form.permission"
      :items="data.permissionItems"
      label="権限" />
    <v-row>
      <v-spacer />
      <v-col
        cols="2">
        <v-btn
          color="primary"
          @click="onSaveButtonClicked">
          {{ isNew ? '保存' : '更新' }}
        </v-btn>
      </v-col>
    </v-row>
  </v-card>
</template>

<script>
import { computed, reactive } from '@vue/composition-api'
import TextInput from '../Common/InputText'
import PasswordInput from '../Common/InputPassword'
import RadioForm from '../Common/RadioForm'

export default {
  name: 'Form',
  components: {
    TextInput,
    PasswordInput,
    RadioForm,
  },
  props: {
    isNew: {
      type: Boolean,
      default: false,
    },
  },
  setup: (props) => {
    const data = reactive({
      form: {
        name: '',
        email: '',
        password: '',
        address: '',
        tel: '',
      },
      sexCodeItems: [
        { label: '不明', value: '不明' },
        { label: '男性', value: '男性' },
        { label: '女性', value: '女性' },
      ],
      permissionItems: [
        { label: 'あり', value: 'あり' },
        { label: 'なし', value: 'なし' },
      ]
    })
    const formTitle = computed(() => props.isNew ? '登録画面' : '編集画面')
    return {
      data,
      formTitle,
    }
  },
  mounted() {
    if (!this.isNew) {
      this.fetchItem()
    }
  },
  methods: {
    async fetchItem() {
      const token = this.$store.state.token
      const userId = this.$route.params.id
      const { data } = await axios.get(`/api/account/${userId}?api_token=${token}`)
      this.data.form = data
    },
    async onSaveButtonClicked() {
      // 新規登録
      if (this.isNew) {
        const token = this.$store.state.token
        await axios.post(`/api/account?api_token=${token}`, this.data.form)
        alert('保存成功しました')
      }
      // 編集
      else {
        const token = this.$store.state.token
        const userId = this.$route.params.id
        const response = await axios.put(`/api/account/${userId}?api_token=${token}`, this.data.form)
        alert('更新成功しました')
      }

      this.$router.push({ name: 'account' })
    },
  },
}
</script>
