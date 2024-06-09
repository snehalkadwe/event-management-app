<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import moment from "moment-js";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    event: Object,
});

const formatDate = (date) => {
    return moment(date).format("MM/DD/YYYY hh:mm");
};
</script>
<template>
    <Head :title="props.event.name" />
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <Link
                    class="py-3 px-5 m-2 rounded bg-blue-600 text-white float-end"
                    :href="route('event.index')"
                    >Back</Link
                >
                <div class="p-12 px-3 m-auto rounded-lg">
                    <div class="mt-12 bg-white py-5 px-3 rounded-lg">
                        <h1 class="text-2xl font-bold">
                            {{ props.event.name }}
                        </h1>
                        <div>
                            {{ props.event.location }}
                        </div>
                        <div class="text-sm">
                            {{ formatDate(props.event.from_datetime) }} -
                            {{ formatDate(props.event.to_datetime) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
