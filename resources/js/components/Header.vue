<template>
<div>
  <v-app-bar color="grey darken-4" dark app clipped-left>
    <v-app-bar-nav-icon @click="data.drawer=!data.drawer"></v-app-bar-nav-icon>
    <v-toolbar-title>管理画面</v-toolbar-title>
    <v-spacer></v-spacer>
    <span class="mr-2">{{ propUserName }}</span>
  </v-app-bar>

  <v-navigation-drawer
    app
    v-model="data.drawer"
    clipped
    dark>
    <v-list>
      <v-list-item
        v-for="(item, index) in data.items"
        :key="index"
        link>
        <v-list-item-icon>
          <v-icon>{{ item.icon }}</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title >
            <router-link :to="{ name: item.name }">{{ item.title }}</router-link>
          </v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
    <template v-slot:append>
      <div class="pa-2">
        <v-btn block v-on:click="logout">Logout</v-btn>
        <form id="logout-form" action="/logout" method="POST" style="display: none;">
        <input type="hidden" name="_token" :value=data.csrf_token>
        </form>
      </div>
    </template>
  </v-navigation-drawer>
</div>
</template>

<script>
import { reactive } from '@vue/composition-api'

export default {
  props: {
    propUserName: {
      type: String,
      required: true,
    },
  },
  setup: (props) => {
    const data = reactive({
      drawer: null,
      items: [
        { title: 'アカウント', icon: 'mdi-account-box', name: "account" },
        { title: 'ログ一覧', icon: 'mdi-gavel', name: "log" },
      ],
      csrf_token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    })
    return {
      data,
    }
  },
  methods: {
    logout() {
      document.getElementById('logout-form').submit()
    },
  },
}
</script>

<style scoped>
.v-application a {
    color: white;
}
</style>
