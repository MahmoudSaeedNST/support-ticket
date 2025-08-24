<script setup>
import { Link, useForm } from '@inertiajs/vue3';
const { ticket } = defineProps({ ticket: Object });
const form = useForm({ status: 'open' });
const closeTicket = () => {
    form.status = 'closed';
    form.put(`/tickets/${ticket.id}`);
};
</script>
<template>
    <div>
        <h1>{{ ticket.title }}</h1>
        <p>{{ ticket.description }}</p>
        <p><strong>Status:</strong> {{ ticket.status }}</p>
        <button v-if="ticket.status === 'open'" @click="closeTicket">Close Ticket</button>
        <br />
        <Link href="/tickets">Back to Tickets</Link>
    </div>
</template>