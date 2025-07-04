<script setup>
import CreateContactModal from "@/Components/CreateContactModal.vue";
import DeleteContactModal from "@/Components/DeleteContactModal.vue";
import EditContactModal from "@/Components/EditContactModal.vue";
import { useContacts } from "@/composables/useContacts";
import { router } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps(["contacts"]);
const {
    createForm,
    updateForm,
    destroyForm,
    selected,
    open,
    create,
    update,
    destroy,
} = useContacts();

const showCreate = ref(false);
const showEdit = ref(false);
const showDelete = ref(false);

const openCreate = () => {
    open();
    showCreate.value = true;
};
const openEdit = (contact) => {
    open(contact);
    showEdit.value = true;
};
const openDelete = (contact) => {
    open(contact);
    showDelete.value = true;
};

const closeCreate = () => (showCreate.value = false);
const closeEdit = () => (showEdit.value = false);
const closeDelete = () => (showDelete.value = false);

const removeContact = () => {
    const index = props.contacts.data.findIndex(
        (c) => c.id === selected.value.id
    );
    if (index !== -1) props.contacts.data.splice(index, 1);

    selected.value = null;
    closeDelete();
};

const goToPage = (url) => {
    if (url) router.visit(url);
};
</script>

<template>
    <div class="min-h-screen bg-gray-900 text-white">
        <div class="max-w-5xl mx-auto py-10">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold flex items-center gap-2">
                    <svg
                        class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                    Fruity Contacts
                </h1>
                <button
                    @click="openCreate"
                    class="px-4 py-2 bg-blue-600 text-white rounded"
                >
                    Add Contact
                </button>
            </div>

            <table class="w-full text-sm text-left text-gray-300">
                <thead class="text-xs uppercase bg-gray-800 text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Phone</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="contact in contacts.data"
                        :key="contact.id"
                        class="bg-gray-700 border-b border-gray-600"
                    >
                        <td class="px-6 py-4">{{ contact.name }}</td>
                        <td class="px-6 py-4">{{ contact.email }}</td>
                        <td class="px-6 py-4">{{ contact.phone }}</td>
                        <td class="px-6 py-4 flex gap-2">
                            <button
                                @click="openEdit(contact)"
                                class="text-blue-400"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536M9 11l6-6m-7.5 7.5L9 11l6-6M3 21h18"
                                    />
                                </svg>
                            </button>
                            <button
                                @click="openDelete(contact)"
                                class="text-red-400"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div
                class="flex justify-center mt-4"
                v-if="contacts.links && contacts.links.length > 1"
            >
                <button
                    v-for="link in contacts.links"
                    :key="link.label"
                    :disabled="!link.url"
                    @click="goToPage(link.url)"
                    v-html="link.label"
                    class="px-3 py-1 mx-1 border rounded disabled:opacity-50"
                ></button>
            </div>

            <CreateContactModal
                :show="showCreate"
                :close="closeCreate"
                :form="createForm"
                :create="create"
            />

            <EditContactModal
                :show="showEdit"
                :close="closeEdit"
                :form="updateForm"
                :update="update"
            />

            <DeleteContactModal
                :show="showDelete"
                :close="closeDelete"
                :selected="selected"
                :destroy="() => destroy(removeContact)"
            />
        </div>
    </div>
</template>
