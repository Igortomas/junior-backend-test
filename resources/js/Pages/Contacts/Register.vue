<template>
  <div class="p-8 max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Novo Contato</h1>

    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label class="block mb-1 font-semibold">Nome</label>
        <input
          type="text"
          v-model="form.name"
          class="w-full border rounded px-3 py-2"
        />
        <span v-if="form.errors.name" class="text-red-500 text-sm">
          {{ form.errors.name }}
        </span>
      </div>

      <div>
        <label class="block mb-1 font-semibold">Email</label>
        <input
          type="email"
          v-model="form.email"
          class="w-full border rounded px-3 py-2"
        />
        <span v-if="form.errors.email" class="text-red-500 text-sm">
          {{ form.errors.email }}
        </span>
      </div>

      <div>
        <label class="block mb-1 font-semibold">Telefone</label>
        <input
          type="text"
          v-model="form.phone"
          class="w-full border rounded px-3 py-2"
        />
        <span v-if="form.errors.phone" class="text-red-500 text-sm">
          {{ form.errors.phone }}
        </span>
      </div>

      <div class="flex justify-end mt-6">
        <button
          type="submit"
          class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded"
        >
          Salvar
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
  import { useForm } from '@inertiajs/vue3'
  import { defineProps } from 'vue'

  const props = defineProps({
    contact: {
      type: Object,
      default: null,
    },
  })

  // Se tiver contact (edição), preenche os campos; senão (criação), inicializa em branco
  const form = useForm({
    name: props.contact?.name || '',
    email: props.contact?.email || '',
    phone: props.contact?.phone || '',
  })

  function submit() {
    if (props.contact) {
      form.put(`/edit/${props.contact.id}`)
    } else {
      form.post('/')
    }
  }
</script>