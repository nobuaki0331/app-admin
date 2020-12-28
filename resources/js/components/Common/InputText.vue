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
        outlined
        dense
        hide-details
        v-on="$listeners" />
    </v-col>
  </v-row>
</template>

<style scoped>
.label-position {
  line-height: 3;
  font-weight: bold;
}
</style>
