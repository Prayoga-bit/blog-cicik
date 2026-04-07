<x-layouts.main>
    <div class="bg-brand-light pb-24">
        <x-blog.read-hero :blog="$blog" />

        <div class="mx-auto mt-[40px] w-full max-w-[1200px] space-y-8 px-6 md:space-y-10 md:px-12">
            <x-blog.read-article :blog="$blog" />
            <x-blog.read-comments :blog="$blog" />
        </div>
    </div>
</x-layouts.main>
