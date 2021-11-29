<template>
  <div class="messages-list">
    <v-data-table
        :headers="headers"
        :items="messages"
        hide-default-footer
    ></v-data-table>
  </div>
</template>

<script>

export default {
  props: {
    messages: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      headers: [
        {
          text: 'Дата',
          align: 'start',
          value: 'date',
        },
        {text: 'Менеджер', value: 'manager'},
        {text: 'Действие', value: 'action'},
      ],
    }
  }
}
</script>