<template>
  <v-menu
    v-model="menu"
    min-width="290px">
    <template v-slot:activator="{ on }">
      <v-text-field
        prepend-icon="mdi-calendar"
        readonly
        clearable
        outlined
        dense
        v-bind="$attrs"
        v-on="on" />
    </template>
    <v-date-picker
      local="ja"
      v-bind="$attrs"
      v-on="$listeners" />
  </v-menu>
</template>

<script>
export default {
  name: 'RowDatePicker',
  data() {
    return {
      menu: false
    };
  },
}
</script>
