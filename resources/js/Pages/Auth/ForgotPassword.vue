<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputLabel from "@/Components/core/InputLabel.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import TextInput from "@/Components/core/TextInput.vue";
import Button from "@/Components/core/Button.vue";
import {Link, useForm} from "@inertiajs/vue3";
import {ChevronLeftIcon} from "@heroicons/vue/24/outline";
import InputError from "@/Components/core/InputError.vue";

defineProps<{
    status?: string;
}>();

const form = useForm<{email: string}>({
    email: '',
});

const submit = (): void => {
    form.post(route('password.email'));
}
</script>

<template>
    <GuestLayout>
        <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <ApplicationLogo class="mx-auto h-16 w-auto"/>
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                    Nie pamiętasz hasła?
                </h2>
                <div class="text-center mt-3">
                    Jeśli na ten e-mail jest założone konto, to wyślemy na niego wiadomość.
                </div>
            </div>

            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-sm">
                <form @submit.prevent="submit" class="space-y-6">
                    <div>
                        <InputLabel for="email" value="Email"/>
                        <TextInput
                            id="email"
                            name="email"
                            type="email"
                            autocomplete="email"
                            v-model="form.email"
                            class="w-full mt-2 mb-2"
                            :class="{ 'border-red-600 border-2 focus:border-red-600 focus:ring-red-600': form.errors.email }"
                            autofocus
                            required
                        />
                        <InputError :message="form.errors.email"/>
                    </div>

                    <div>
                        <Button
                            as="button"
                            intent="primary"
                            :disabled="form.processing"
                            :loading="form.processing"
                        >Odzyskaj hasło
                        </Button>
                    </div>
                </form>

                <div class="text-center mt-3 fixed left-5 bottom-5">
                    <Link :href="route('home')" class="py-2 px-3 rounded-lg bg-gray-100 inline-flex items-center gap-2"
                    >
                        <ChevronLeftIcon class="h-5 w-5 inline-flex"/>
                        Wróć do strony głównej
                    </Link>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
