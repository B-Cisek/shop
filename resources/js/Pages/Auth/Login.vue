<script setup lang="ts">
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Button from "@/Components/core/Button.vue";
import TextInput from "@/Components/core/TextInput.vue";
import InputLabel from "@/Components/core/InputLabel.vue";
import {useForm, Link} from "@inertiajs/vue3";
import {ChevronLeftIcon} from "@heroicons/vue/24/outline";
import Checkbox from "@/Components/core/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/core/InputError.vue";

type LoginPayload = {
    email: string,
    password: string,
    remember: boolean
};

const form = useForm<LoginPayload>({
    email: '',
    password: '',
    remember: false
});

const signIn = (): void => {
    form.post(route('login'), {
        onFinish: () => {
            form.reset('password')
        }
    });
};
</script>

<template>
    <GuestLayout>
        <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <ApplicationLogo class="mx-auto h-16 w-auto"/>
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Zaloguj się</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form @submit.prevent="signIn" class="space-y-6">
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
                        <div class="flex items-center justify-between">
                            <InputLabel for="password" value="Hasło"/>
                            <div class="text-sm">
                                <Link
                                    :href="route('password.request')"
                                    class="font-semibold text-indigo-600 hover:text-indigo-500">
                                    Nie pamiętasz hasła?
                                </Link>
                            </div>
                        </div>

                        <TextInput
                            id="password"
                            name="password"
                            type="password"
                            v-model="form.password"
                            class="w-full mt-2 mb-2"
                            :class="{ 'border-red-600 border-2 focus:border-red-600 focus:ring-red-600': form.errors.password }"
                            autocomplete="current-password"
                            required
                        />
                        <InputError :message="form.errors.password"/>
                    </div>

                    <div class="inline-flex gap-2">
                        <Checkbox :checked="form.remember" v-model="form.remember"/>
                        <InputLabel value="Zapamiętaj mnie"/>
                    </div>

                    <div>
                        <Button
                            as="button"
                            intent="primary"
                            :disabled="form.processing"
                            :loading="form.processing"
                        >Zaloguj się
                        </Button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <span>Nie masz konta? <Link :href="route('register')"
                                                class="font-semibold text-indigo-700">Załóż konto</Link></span>
                </div>
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

