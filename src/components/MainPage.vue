<template>
  <v-app class="container">
    <v-app-bar-title class="my-5">
      <h1 class="display-1 font-weight-bold indigo--text"> История изменений: </h1>
    </v-app-bar-title>
    <v-main>
      <search-bar/>
      <messages-list :messages="filteredMessages"/>
    </v-main>
  </v-app>
</template>

<script>
import MessagesList from "@/components/MessagesList";
import SearchBar from "@/components/SearchBar";
import messages from "@/mocks/messages";

export default {
  components: {SearchBar, MessagesList},
  data() {
    return {
      messages,
      filteredMessages: messages,
    }
  },
  watch: {
    $route(newValue) {
      let startDate = undefined;
      let endDate = undefined;
      if(newValue.query.date[1]>newValue.query.date[0]) {
        startDate = newValue.query.date[0];
        endDate = newValue.query.date[1];
      } else if (newValue.query.date[0] > newValue.query.date[1]) {
        startDate = newValue.query.date[1];
        endDate = newValue.query.date[0];
      }
      if(startDate!=undefined && endDate!=undefined && newValue.query.manager == undefined) {
        this.filteredMessages = this.messages.filter(function (message) {
          return message.date >= startDate && message.date <= endDate;
        })
      } else if (newValue.query.date.length < 1 && newValue.query.manager != undefined) {
        this.filteredMessages = this.messages.filter(function (message) {
          return message.manager.includes(newValue.query.manager);
        })
      } else if (startDate!=undefined && endDate!=undefined && newValue.query.manager != undefined) {
        this.filteredMessages = this.messages.filter(function (message) {
          return message.date >= startDate && message.date <= endDate && message.manager.includes(newValue.query.manager);
        })
      } else {
        this.filteredMessages = messages;
      }
    }
  }
}
</script>