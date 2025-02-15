<script setup>
import { ref, onMounted, onBeforeUnmount, defineEmits, defineProps } from 'vue';

const props = defineProps({
    modelValue: String,
    config: Object,
});

const emit = defineEmits(['update:modelValue']);
const editorId = `ckeditor-${Math.random().toString(36).substr(2, 9)}`;
const editorInstance = ref(null);

const initializeEditor = () => {
    if (window.CKEDITOR) {
        // Set global config before creating instance
        CKEDITOR.config.removePlugins = 'notification';

        CKEDITOR.replace(editorId, {
            ...props.config, 
            removePlugins: 'notification', // Hide security warning
        });

        editorInstance.value = CKEDITOR.instances[editorId];
        editorInstance.value.setData(props.modelValue || '');

        editorInstance.value.on('change', function () {
            emit('update:modelValue', this.getData());
        });
    }
};

onMounted(() => {
    if (!window.CKEDITOR) {
        const script = document.createElement('script');
        script.src = 'https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js'; // Keep your version
        script.onload = initializeEditor;
        document.head.appendChild(script);
    } else {
        initializeEditor();
    }
});

// Cleanup CKEditor instance
onBeforeUnmount(() => {
    if (editorInstance.value) {
        editorInstance.value.destroy();
    }
});
</script>

<template>
    <textarea :id="editorId"></textarea>
</template>

<style scoped>
.cke_notification { 
    display: none !important; 
}

</style>