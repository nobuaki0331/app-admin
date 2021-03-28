<template>
  <v-card>
    <v-card-title
      class="font-weight-bold">
      お問い合わせ
    </v-card-title>
    <text-input
      v-model="form.name"
      label="名前" />
    <select-form
      v-model="form.prefecture"
      label="都道府県" />
    <select-year
      v-model="form.year"
      label="誕生年" />
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
import SampleText from '../Common/SampleText'
import TextInput from '../Common/InputText'
import TextArea from '../Common/InputTextarea'
import SelectForm from '../Common/SelectForm'
import SelectYear from '../Common/SelectYear'


export default {
  name: 'ContactIndex',
  components: {
    SampleText,
    TextInput,
    TextArea,
    SelectForm,
    SelectYear,
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
        prefecture: '',
        year: '',
      },
    }
  },
  created() {
    this.fetchItem()
  },
  methods: {
    fetchItem() {
    },
    async onSaveButtonClicked(){
      // await axios.post('api/contact', this.form)
    },
  },
}
</script>
