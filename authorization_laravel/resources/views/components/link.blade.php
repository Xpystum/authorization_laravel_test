@props(['to' => '#'])

<a href="{{  $to }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">
    {{ $slot }}
</a>
