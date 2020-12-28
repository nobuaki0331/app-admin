<template>
  <v-card>
    <v-card-title
      class="font-weight-bold">
      {{ formTitle }}
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
      label="住所" />
    <text-input
      v-model="data.form.tel"
      label="電話番号" />
    <v-row>
      <v-spacer />
      <v-col
        cols="2">
        <v-btn
          color="primary"
          @click="onSaveButtonClicked">
          保存
        </v-btn>
      </v-col>
    </v-row>
  </v-card>
</template>

<script>
import { computed, reactive } from '@vue/composition-api'
import TextInput from '../Common/InputText'
import PasswordInput from '../Common/InputPassword'

export default {
  name: 'Form',
  components: {
    TextInput,
    PasswordInput,
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
    })
    const formTitle = computed(() => props.isNew ? '登録画面' : '編集画面')
    return {
      data,
      formTitle,
    }
  },
  methods: {
    async onSaveButtonClicked() {
      try {
        const token = this.$store.state.token
        await axios.post(`/api/account?api_token=${token}`, this.data.form)
      } catch (e) {
        console.log(e.message)
      }

      this.$router.push({ name: 'account' })
    },
  },
}
</script>
