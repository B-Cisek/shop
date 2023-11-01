import {defineStore} from 'pinia';
import {ref} from "vue";

export const useCartToggleStore = defineStore('cartToggle', () => {
    const isOpened = ref<boolean>(false);

    function setIsOpened(value: boolean) {
        isOpened.value = value;
    }

    return {isOpened, setIsOpened}
});
