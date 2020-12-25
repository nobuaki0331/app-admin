<template>
  <v-row class="mt-2 pa-0">
    <v-col
      cols="2"
      offset="1">
      <label class="label-position">{{ $attrs.label }}</label>
    </v-col>
    <v-col
      cols="3">
      <v-text-field
        v-bind="$attrs"
        :append-icon="toggle.icon"
        outlined
        dense
        :type="toggle.type"
        hide-details
        autocomplete="on"
        @click:append="show = !show"
        v-on="$listeners" />
    </v-col>
  </v-row>
</template>

<script>
export default {
  data() {
    return {
      show: false,
    }
  },
  computed: {
    toggle() {
      const icon = this.show ? 'mdi-eye' : 'mdi-eye-off'
      const type = this.show ? 'text' : 'password'
      return { icon, type }
    },
  },
}

</script>

<style scoped>
.label-position {
  margin-right: 10px;
  line-height: 2.5;
}
</style>
