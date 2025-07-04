import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

export function useContacts() {
    const selected = ref(null);

    const createForm = useForm({
        name: "",
        email: "",
        phone: "",
        address: "",
        notes: "",
    });

    const updateForm = useForm({
        id: null,
        name: "",
        email: "",
        phone: "",
        address: "",
        notes: "",
    });

    const destroyForm = useForm({});

    const open = (contact) => {
        createForm.reset();
        createForm.clearErrors();
        updateForm.reset();
        updateForm.clearErrors();
        selected.value = null;

        if (!contact) return;

        updateForm.id = contact.id;
        updateForm.name = contact.name;
        updateForm.email = contact.email;
        updateForm.phone = contact.phone;
        updateForm.address = contact.address || "";
        updateForm.notes = contact.notes || "";
        selected.value = contact;
    };

    const create = () => {
        createForm.post("/contacts", {
            preserveScroll: true,
            onSuccess: () => {
                createForm.reset();
                createForm.clearErrors();
            },
            onError: (errors) => console.error(errors),
        });
    };

    const update = () => {
        updateForm.put(`/contacts/${updateForm.id}`, {
            preserveScroll: true,
            onSuccess: () => {
                updateForm.reset();
                updateForm.clearErrors();
                selected.value = null;
            },
            onError: (errors) => console.error(errors),
        });
    };

    const destroy = (close) => {
        if (!selected.value) return;

        destroyForm.delete(`/contacts/${selected.value.id}`, {
            preserveScroll: true,
            onSuccess: () => {
                selected.value = null;
                close();
            },
            onError: (errors) => console.error(errors),
        });
    };

    const formatPhone = (value) => {
        const numbers = value.replace(/\D/g, "");
        return numbers.length <= 10
            ? numbers.replace(/(\d{2})(\d{4})(\d{4})/, "($1) $2-$3")
            : numbers.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");
    };

    return {
        createForm,
        updateForm,
        destroyForm,
        selected,
        open,
        create,
        update,
        destroy,
        formatPhone,
    };
}
