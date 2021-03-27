<template>
  <v-card>
    <v-card-title
      class="font-weight-bold">
      画像アップロード
    </v-card-title>
    <v-row>
      <v-col
        cols="4"
        offset="1">
      <input
        type="file"
        @change="onChangeFileImage" />
      </v-col>
    </v-row>
    <v-spacer />
    <v-row>
      <v-col
        cols="2"
        offset="1">
        <v-btn
          color="primary"
          @click="onUploadButtonClicked">
          アップロード
        </v-btn>
      </v-col>
    </v-row>
    <v-row>
      <div v-if="user.image">
        <img :src="user.image">
      </div>
    </v-row>
  </v-card>
</template>


<script>

export default {
  name: 'ImageUpload',
  components: {
  },
  props: {
  },
  data() {
    return {
      fileInfo: '',
      user: '',
    }
  },
  methods: {
    onChangeFileImage(event) {
      this.fileInfo = event.target.files[0]
    },
    async onUploadButtonClicked() {
      const formData = new FormData()
      formData.append('file', this.fileInfo)
      const token = this.$store.state.token
      const { data } = await axios.post(`/api/image?api_token=${token}`, formData)
      this.user = data
    },
  },
}
</script>
