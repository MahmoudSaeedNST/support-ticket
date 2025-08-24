<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({tickets: Array});

</script>

<template>
  <div>
    <h1>Support Tickets</h1>
    <Link href="/tickets/create">New Ticket</Link>
    <ul>
      <li v-for="ticket in tickets" :key="ticket.id">
        <Link :href="`/tickets/${ticket.id}`">{{ ticket.title }} – ({{ ticket.status }})</Link>
      </li>
    </ul>
  </div>
</template>