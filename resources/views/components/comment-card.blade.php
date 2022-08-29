@props(['comment'])


<table class="w-full table-auto rounded-sm">
    <tbody>
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="show.html">
                            {{ $comment->description }}
                        </a>
                    </td>
                </tr>
    </tbody>
</table>