@props(['message'])
@if ($message)
<div class="p-4 m-2 rounded bg-green-100">
    {{$message}}
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
</div>
@endif