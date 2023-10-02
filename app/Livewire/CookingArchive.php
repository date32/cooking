<?php

namespace App\Livewire;

use App\Models\Date;
use Carbon\Carbon;
use Livewire\Component;

class CookingArchive extends Component
{
    public $archiveLinks = [];

    public function mount()
    {
        // 現在の年月を取得
        $now = Carbon::now();

        // アーカイブ
        $archivedDates = Date::whereYear('date', '<', $now->year)
            ->orWhere(function ($query) use ($now) {
                $query->whereYear('date', $now->year)
                    ->whereMonth('date', '<', $now->month);
            })
            ->orderBy('date', 'desc')
            ->get();
        // 年月ごとにデータをグループ化
        $archive = $archivedDates->groupBy(function ($date) {
            return Carbon::parse($date->date)->format('Y-m');
        });
        // リンク作成
        foreach ($archive as $yearMonth => $data) {
            $this->archiveLinks[] = [
                'yearMonth' => $yearMonth,
            ];
        }
    
    }
    public function render()
    {
        return view('livewire.cooking-archive');
    }
}
