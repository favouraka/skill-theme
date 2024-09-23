import './bootstrap';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import intersect from '@alpinejs/intersect';
// Register any Alpine directives, components, or plugins here...
Alpine.plugin(intersect)

Livewire.start()
