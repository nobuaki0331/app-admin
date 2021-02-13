<template>
  <v-row class="mt-2 pa-0">
    <v-col
      cols="2"
      offset="1">
      <label class="label-position">{{ $attrs.label }}</label>
    </v-col>
    <v-col
      :cols="columnSize">
      <v-select
        v-model="select"
        :hint="`${select.state}, ${select.abbr}`"
        :items="items"
        item-text="state"
        item-value="abbr"
        label="Select"
        persistent-hint
        return-object
        single-line />
    </v-col>
  </v-row>
</template>

<script>
  export default {
    data () {
      return {
        select: { state: 'Florida', abbr: 'FL' },
        items: [
          { state: 'Florida', abbr: 'FL' },
          { state: 'Georgia', abbr: 'GA' },
          { state: 'Nebraska', abbr: 'NE' },
          { state: 'California', abbr: 'CA' },
          { state: 'New York', abbr: 'NY' },
        ],
      }
    },
  }
</script>

<style scoped>
.label-position {
  line-height: 3;
  font-weight: bold;
}
</style>
