<script setup lang="ts">
import {UserCircleIcon} from "@heroicons/vue/24/outline";
import {Link} from "@inertiajs/vue3";
import {MenuItem, MenuItems, Menu, MenuButton} from "@headlessui/vue";
</script>

<template>
    <Menu as="div" class="relative ml-3">
        <div>
            <MenuButton
                class="relative flex max-w-xs items-center rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="absolute -inset-1.5"/>
                <span class="sr-only">Open user menu</span>
                <UserCircleIcon class="h-8 w-8 text-gray-400"/>
            </MenuButton>
        </div>
        <transition enter-active-class="transition ease-out duration-100"
                    enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
                    leave-active-class="transition ease-in duration-75"
                    leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <MenuItems
                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                <MenuItem as="div">
                    <Link :href="route('profile')" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Twoje Konto</Link>
                    <Link
                        :href="route('logout')"
                        class="block px-4 py-2 text-sm text-gray-700"
                        method="POST"
                        as="button"
                        role="menuitem"
                        tabindex="-1"
                        type="button"
                    >Wyloguj się</Link>
                </MenuItem>
            </MenuItems>
        </transition>
    </Menu>
</template>
