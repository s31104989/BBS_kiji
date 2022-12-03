<x-guest-layout>
    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>

    <h2>みんなのコメント</h2>
    @forelse ($comments as $comment)
        <p class="bg-gray-300 p-2">{{ $comment['content'] }}</p>
    @empty
        <p>コメントはまだありません。</p>
    @endforelse

    @auth
        <h2>コメントを投稿する</h2>
        <form class="grid grid-cols-1 gap-6 text-black" method='POST' action="{{ route('store_comment') }}" enctype="multipart/form-data">
            @csrf
            <input type='hidden' name='post_id' value="{{ $post['id'] }}">
            <label class="block">
                <textarea name='content'
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    rows="3"></textarea>
            </label>
            <button type='submit' class="w-20 bg-blue-600 hover:bg-blue-500 text-white rounded px-4 py-2">投稿</button>
        </form>
    @else
        <p>ログインするとコメントを投稿することができます。</p>
    @endauth
</x-guest-layout>