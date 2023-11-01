<script setup lang="ts">
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Button from "@/Components/core/Button.vue";
import TextInput from "@/Components/core/TextInput.vue";
import InputLabel from "@/Components/core/InputLabel.vue";
import {useForm, Link} from "@inertiajs/vue3";
import InputError from "@/Components/core/InputError.vue";
import Checkbox from "@/Components/core/Checkbox.vue";
import {ChevronLeftIcon} from "@heroicons/vue/24/outline";
import GuestLayout from "@/Layouts/GuestLayout.vue";

type RegisterPayload = {
    email: string,
    password: string,
    password_confirmation: string,
    consents: {
        regulations: boolean,
        newsletter: boolean
    }
};

const form = useForm<RegisterPayload>({
    email: '',
    password: '',
    password_confirmation: '',
    consents: {
        regulations: false,
        newsletter: false
    }
});

const signOn = (): void => {
    form.post(route('register'));
};
</script>

<template>
    <GuestLayout>
        <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <ApplicationLogo class="mx-auto h-16 w-auto"/>
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Zarejestruj
                    się</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form @submit.prevent="signOn" class="space-y-6">
                    <div>
                        <InputLabel for="email" value="Email"/>
                        <TextInput
                            id="email"
                            name="email"
                            type="email"
                            autocomplete="email"
                            v-model="form.email"
                            class="w-full mt-2"
                            :class="{ 'border-red-700 border-2 focus:border-red-700 focus:ring-red-700': form.errors.email }"
                            autofocus
                            required
                        />
                        <InputError :message="form.errors.email"/>
                    </div>

                    <div>
                        <InputLabel for="password" value="Hasło"/>
                        <TextInput
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="password"
                            v-model="form.password"
                            class="w-full mt-2"
                            :class="{ 'border-red-700 border-2 focus:border-red-700 focus:ring-red-700': form.errors.password }"
                            required
                        />
                        <InputError :message="form.errors.password"/>
                    </div>

                    <div>
                        <InputLabel for="password_confirmation" value="Powtórz Hasło"/>
                        <TextInput
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            autocomplete="password_confirmation"
                            v-model="form.password_confirmation"
                            class="w-full mt-2"
                            :class="{ 'border-red-700 border-2 focus:border-red-700 focus:ring-red-700': form.errors.password_confirmation }"
                            required
                        />
                        <InputError :message="form.errors.password_confirmation"/>
                    </div>

                    <div>
                        <div class="inline-flex gap-2">
                            <Checkbox
                                :checked="form.consents.regulations"
                                v-model="form.consents.regulations"
                                :class="{ 'border-red-700 border-2 focus:border-red-700 focus:ring-red-700': form.errors.consents }"
                            />
                            <InputLabel>
                                Akceptuję
                                <Link :href="route('home')" class="font-semibold text-indigo-700">regulamin</Link>
                                sklepu<span class="text-red-700">*</span>
                            </InputLabel>
                            <InputError :message="form.errors.consents"/>
                        </div>
                    </div>

                    <div>
                        <div class="inline-flex gap-2">
                            <Checkbox :checked="form.consents.newsletter" v-model="form.consents.newsletter"/>
                            <InputLabel
                                value="Chcę otrzymywać informacje o aktualnych ofertach oraz promocjach w wiadomości e‑mail"/>
                            <InputError :message="form.errors.consents"/>
                        </div>
                    </div>

                    <div>
                        <Button
                            as="button"
                            intent="primary"
                            :disabled="form.processing"
                            :loading="form.processing"
                        >Zarejestruj się
                        </Button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <span>Masz już konto? <Link :href="route('login')"
                                                class="font-semibold text-indigo-700">Zaloguj się</Link></span>
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
