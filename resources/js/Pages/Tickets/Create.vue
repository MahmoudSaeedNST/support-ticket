<script setup>
import { Form, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    description: '',
});

const submit = () => {
    form.post('/tickets');
};

</script>

<template>
    <div>
        <h1>Create Ticket</h1>
        <!-- <form @submit.prevent="submit">
            <input v-model="form.title" placeholder="Title" />
            <textarea v-model="form.description" placeholder="Description"></textarea>
            <button type="submit">Submit</button>
        </form> -->
    </div>
    <!-- OR -->
     <Form :action="'/tickets'" method="post">
      <input name="title" placeholder="Title" />
      <textarea name="description" placeholder="Description"></textarea>
      <button type="submit">Submit</button>
    </Form>
</template>