<template>
  <div class="p-8 max-w-4xl mx-auto">
    <!-- Alerta de sucesso -->
    <div v-if="page.props.flash.success" class="mb-4 p-4 bg-green-100 text-green-800 rounded">
      {{ page.props.flash.success }}
    </div>

    <!-- Cabeçalho -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold">Contatos</h1>

      <Link
        href="/register"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
      >
        Novo Contato
      </Link>
    </div>

    <!-- Lista de contatos -->
    <div v-if="contacts.data.length" class="space-y-3">
      <div
        v-for="contact in contacts.data"
        :key="contact.id"
        class="border p-4 rounded shadow-sm flex justify-between items-center"
      >
        <div>
          <div class="font-semibold">{{ contact.name }}</div>
          <div class="text-sm text-gray-600">{{ contact.email }}</div>
          <div class="text-sm text-gray-600">{{ contact.phone }}</div>
        </div>
        <div class="flex space-x-3">
          <Link
            :href="`/edit/${contact.id}`"
            class="text-blue-600 hover:text-blue-800"
          >
            <Pencil />
          </Link>
          <button
            @click="deleteContact(contact.id)"
            class="text-red-600 hover:text-red-800"
          >
            <Trash2 />
          </button>
        </div>
      </div>
    </div>

    <div v-else class="text-gray-500">Nenhum contato cadastrado.</div>
  </div>
</template>

<script setup>
  import { Link, usePage, router } from '@inertiajs/vue3'
  import { Pencil, Trash2 } from 'lucide-vue-next'

  defineProps({
    contacts: Object
  })

  function deleteContact(id) {
    if (confirm('Deseja realmente excluir este contato?')) {
      router.delete(`/${id}`)
    }
  }


  const page = usePage()
</script>