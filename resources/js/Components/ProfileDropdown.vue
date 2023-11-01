<script setup lang="ts">
import {UserCircleIcon} from "@heroicons/vue/24/outline";
import {Link} from "@inertiajs/vue3";
</script>

<template>
  <div class="relative ml-3">
    <div>
      <button type="button"
              class="relative flex max-w-xs items-center rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
              id="user-menu-button" aria-expanded="false" aria-haspopup="true">
        <span class="absolute -inset-1.5"></span>
        <span class="sr-only">Open drop down menu</span>
        <UserCircleIcon class="h-6 w-6 text-gray-500" />
      </button>
    </div>

    <!--
      Dropdown menu, show/hide based on menu state.

      Entering: "transition ease-out duration-100"
        From: "transform opacity-0 scale-95"
        To: "transform opacity-100 scale-100"
      Leaving: "transition ease-in duration-75"
        From: "transform opacity-100 scale-100"
        To: "transform opacity-0 scale-95"
    -->
    <div
        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
      <!-- Active: "bg-gray-100", Not Active: "" -->
      <Link
          :href="route('profile')"
          class="block px-4 py-2 text-sm text-gray-700"
          role="menuitem"
          tabindex="-1"
          id="user-menu-item-0">Twoje Konto</Link>
      <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
      <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign
        out</a>
      <Link
          :href="route('logout')"
          class="block px-4 py-2 text-sm text-gray-700"
          method="POST"
          as="button"
          role="menuitem"
          tabindex="-1"
          type="button"
      >Wyloguj się</Link>
    </div>
  </div>
</template>
