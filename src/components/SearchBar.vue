<template>
  <v-app-bar dark>
    <v-row cols-12>
      <v-col cols="4">
        <v-menu
            ref="menu"
            v-model="menu"
            :close-on-content-click="false"
            :return-value.sync="searchDates"
            transition="scale-transition"
            offset-y
            min-width="auto"
        >
          <template v-slot:activator="{ on, attrs }">
            <v-combobox
                v-model="searchDates"
                multiple
                label="Выберите дату"
                prepend-icon="mdi-calendar"
                readonly
                v-bind="attrs"
                v-on="on"
                clearable
                @click:clear="clearDates"
                flat
                solo-inverted
                hide-details
            ></v-combobox>
          </template>
          <v-date-picker
              v-model="searchDates"
              multiple
              range
              no-title
              scrollable
          >
            <v-spacer></v-spacer>
            <v-btn
                text
                color="primary"
                @click="menu = false"
            >
              Cancel
            </v-btn>
            <v-btn
                text
                color="primary"
                @click="$refs.menu.save(searchDates);
                    $router.push({ name: 'messages', query: {date: searchDates, manager: searchManager}})"
            >
              OK
            </v-btn>
          </v-date-picker>
        </v-menu>
      </v-col>
      <v-col cols="3">
        <v-text-field
            v-model="searchManager"
            append-icon="mdi-magnify"
            label="Email менеджера"
            clearable
            @click:clear="clearSearch"
            flat
            solo-inverted
            hide-details
            single-line
            @click:append="$router.push({ name: 'messages', query: {date: searchDates, manager: searchManager}})"
        >
        </v-text-field>
      </v-col>
    </v-row>
  </v-app-bar>
</template>

<script>
export default {
  props: ['date', 'manager'],
  data() {
    return {
      searchDates: [],
      menu: false,
      searchManager: undefined,
    }
  },
  created: function() {
    this.date = this.$route.query.date
    this.manager = this.$route.query.manager
  },
  methods: {
    clearDates() {
      this.searchDates = [];
      this.$router.replace({'query': {'date': this.searchDates, 'manager': this.searchManager}});
    },
    clearSearch() {
      this.searchManager = undefined;
      this.$router.replace({'query': {'date': this.searchDates, 'manager': this.searchManager}});
    }
  },
}
</script>