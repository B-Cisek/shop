<script setup lang="ts">
import {useForm} from "@inertiajs/vue3";
import InputLabel from "@/Components/core/InputLabel.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import InputError from "@/Components/core/InputError.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import TextInput from "@/Components/core/TextInput.vue";
import Button from "@/Components/core/Button.vue";

const props = defineProps<{
    email: string;
    token: string;
}>();

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = (): void => {
    form.post(route('password.store'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};
</script>

<template>
    <GuestLayout>
        <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <ApplicationLogo class="mx-auto h-16 w-auto"/>
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                    Resetowanie hasła
                </h2>
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
                        <InputLabel for="password" value="Hasło"/>
                        <TextInput
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="password"
                            v-model="form.password"
                            class="w-full mt-2"
                            :class="{ 'border-red-600 border-2 focus:border-red-600 focus:ring-red-600': form.errors.password }"
                            required
                        />
                        <InputError :message="form.errors.password"/>
                    </div>

                    <div>
                        <InputLabel for="password_confirmation" value="Potwierdź Hasło"/>
                        <TextInput
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            autocomplete="password_confirmation"
                            v-model="form.password_confirmation"
                            class="w-full mt-2"
                            :class="{ 'border-red-600 border-2 focus:border-red-600 focus:ring-red-600': form.errors.password_confirmation }"
                            required
                        />
                        <InputError :message="form.errors.password_confirmation"/>
                    </div>

                    <div>
                        <Button
                            as="button"
                            intent="primary"
                            :disabled="form.processing"
                            :loading="form.processing"
                        >Resetuj
                        </Button>
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>

