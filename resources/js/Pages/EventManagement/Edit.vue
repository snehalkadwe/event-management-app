<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, usePage } from "@inertiajs/vue3";
import VueDatePicker from "@vuepic/vue-datepicker";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(["event"]);

const form = useForm({
    id: props.event.id,
    name: props.event.name,
    location: props.event.location,
    startDate: props.event.from_datetime,
    endDate: props.event.to_datetime,
});

const update = () => {
    form.put(route("event.update", props.event.id));
};
</script>

<template>
    <Head title="Event Management" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Event
            </h2>
        </template>

        <div class="p-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="update">
                        <div class="space-y-12 p-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <h2
                                    class="text-base font-semibold leading-7 text-gray-900"
                                >
                                    Event
                                </h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">
                                    Update the event details here
                                </p>

                                <div
                                    class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                                >
                                    <div class="sm:col-span-3">
                                        <label
                                            for="name"
                                            class="block text-sm font-medium leading-6 text-gray-900"
                                            >Event name</label
                                        >
                                        <div class="mt-2">
                                            <input
                                                type="text"
                                                v-model="form.name"
                                                id="name"
                                                autocomplete="event name"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            />
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label
                                            for="location"
                                            class="block text-sm font-medium leading-6 text-gray-900"
                                            >Location</label
                                        >
                                        <div class="mt-2">
                                            <input
                                                type="text"
                                                v-model="form.location"
                                                id="location"
                                                autocomplete="location"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            />
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label
                                            for="start-date"
                                            class="block text-sm font-medium leading-6 text-gray-900"
                                            >Start Date</label
                                        >
                                        <VueDatePicker
                                            v-model="form.startDate"
                                        />
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label
                                            for="end-date"
                                            class="block text-sm font-medium leading-6 text-gray-900"
                                            >End date</label
                                        >
                                        <VueDatePicker v-model="form.endDate" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="mt-6 flex items-center justify-end gap-x-6"
                            >
                                <button
                                    type="button"
                                    class="text-sm font-semibold leading-6 text-gray-900"
                                >
                                    Cancel
                                </button>
                                <PrimaryButton
                                    class="bg-indigo-800 hover:bg-blue-500"
                                    >Save</PrimaryButton
                                >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
