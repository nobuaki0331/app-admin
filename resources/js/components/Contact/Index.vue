<template>
  <v-card>
    <v-card-title
      class="font-weight-bold">
      お問い合わせ
    </v-card-title>
    <text-input
      v-model="form.name"
      label="名前" />
    <text-input
      v-model="form.email"
      label="メールアドレス" />
    <text-input
      v-model="form.title"
      label="タイトル" />
    <text-area
      v-model="form.inquiry"
      label="問い合わせ内容" />
    <v-row>
      <v-spacer />
      <v-col
        cols="2">
        <v-btn
          color="primary"
          @click="onSaveButtonClicked">
          送信
        </v-btn>
      </v-col>
    </v-row>
  </v-card>
</template>


<script>
import _ from 'lodash'
import TextInput from '../Common/InputText'
import TextArea from '../Common/InputTextarea'

export default {
  name: 'ContactIndex',
  components: {
    TextInput,
    TextArea,
  },
  props: {
    isNew: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      form: {
        name: '',
        email: '',
        title: '',
        inquiry: '',
        token: '',
      },
    }
  },
  watch: {
    form: {
      handler:  _.debounce(function() {
        this.form = {
          name: '',
          email: '',
          title: '',
          inquiry: '',
          token: '',
        }
      }, 10000),
      deep: true
    }
  },
  created() {
    this.fetchItem()
  },
  methods: {
    clearForm() {
      console.log('hoge')
    },
    fetchItem() {
    },
    async onSaveButtonClicked(){
      // await axios.post('api/contact', this.form)
    },
  },
}
</script>
