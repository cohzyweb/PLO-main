<x-admin-layout>
    <div class="p-4 mx-auto max-w-7xl md:p-6">
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">会員詳細</h2>
            {{-- <a href="{{ route('admin.member.index') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 transition ring-1 ring-inset ring-gray-300 rounded-lg bg-white shadow-theme-xs hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
        戻る
      </a> --}}
        </div>

        <div
            class="bg-white rounded-lg shadow-xl overflow-auto border border-gray-200 dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="p-4">
                <div class="flex gap-4 flex-col w-full">
                    <!-- Left side -->
                      <div class="w-2/3" style="width: 70%;">
                          <!-- Member Info -->
                          <table class="w-full border-collapse border-t border-l border-gray-400">
                              <tbody>
                                  <tr>
                                      <th class="p-1 w-[120px] text-left font-semibold bg-gray-100 border-b border-r border-gray-400"
                                          style="width: 140px;">会員番号</th>
                                      <td class="p-1 border-b border-r border-gray-400" id="member_id">{{ $member->id }}
                                      </td>
                                      <th class="p-1 w-[120px] text-left font-semibold bg-gray-100 border-b border-r border-gray-400"
                                          style="width: 140px;">ニックネーム</th>
                                      <td class="p-1 border-b border-r border-gray-400">{{ $member->name }}</td>
                                  </tr>
                                  <tr>
                                      <th class="p-1 text-left font-semibold bg-gray-100 border-b border-r border-gray-400"
                                          style="width: 140px;">携帯番号</th>
                                      <td class="p-1 border-b border-r border-gray-400">{{ $member->tel }}</td>
                                      <th class="p-1 text-left font-semibold bg-gray-100 border-b border-r border-gray-400"
                                          style="width: 140px;">会員名</th>
                                      <td class="p-1 border-b border-r border-gray-400">{{ $member->subname }}</td>
                                  </tr>
                                  <tr>
                                      <th class="p-1 text-left font-semibold bg-gray-100 border-b border-r border-gray-400"
                                          style="width: 140px;">現在のポイント</th>
                                      <td class="p-1 border-b border-r border-gray-400" colspan="3">
                                          {{ number_format($member->pay) . 'pt' }}</td>
                                  </tr>
                              </tbody>
                          </table>
                        </div>
                      <div class="w-full flex flex-row gap-4" >
                        {{-- <div class="text-right mb-2 font-semibold">{{ \Carbon\Carbon::now()->format('Y年m月d日') }}</div> --}}
                        <table class="w-1/3 text-sm border-collapse border border-gray-400">
                            <tbody>
                                {{-- <tr>
                                    <th class="p-1 w-[100px] font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">利用ポイント</th>
                                    <td class="p-1 border-b border-gray-400"><input type="number" value="0"
                                            class="p-1 border border-gray-400 text-right w-full" name="point_use"
                                            id="point_use"></td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">取得ポイント</th>
                                    <td class="p-1 border-b border-gray-400"><input type="number" name="point"
                                            id="point" value="0"
                                            class="p-1 border border-gray-400 text-right w-full" readonly></td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">PLOの日</th>
                                    <td class="p-1 border-b border-gray-400"><input type="checkbox" name="plo_day"
                                            id="plo_day" value="1"
                                            class="p-1 border border-gray-400 text-right w-full"
                                            onchange="updatePrice()"></td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">料金</th>
                                    <td class="p-1 border-b border-gray-400"><input name="price" readonly
                                            id="price" type="number" value="0"
                                            class="p-1 border border-gray-400 text-right w-full"></td>
                                </tr> --}}
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">キャスト名</th>
                                    <td class="p-1 border-b border-gray-400">
                                        <select class="p-1 border border-gray-400 w-full bg-white" name="cast"
                                            id="cast">
                                            <option value=""></option>
                                            @foreach ($casts as $cast)
                                                <option value="{{ $cast->id }}">{{ $cast->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">指名</th>
                                    <td class="p-1 border-b border-gray-400">
                                        <div class="flex items-center gap-2">
                                            <select class="p-1 border border-gray-400 w-full bg-white"
                                                name="appointment" id="appointment" onchange="updatePrice()">
                                                <option value="" data-price="0">選択してください</option>
                                                <option value="0" data-price="{{ $appoints[0]->panel_price }}"
                                                    data-id="{{ $appoints[0]->id }}">パネル指名</option>
                                                <option value="1" data-price="{{ $appoints[0]->repeat_price }}"
                                                    data-id="{{ $appoints[0]->id }}">本指名</option>
                                            </select>
                                            <span>X</span>
                                            <input type="number" value="0"
                                                class="p-1 border border-gray-400 text-right w-[50px]"
                                                name="appointment_count" id="appointment_count"
                                                onchange="updatePrice()" min="0" max="60">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">コース</th>
                                    <td class="p-1 border-b border-gray-400">
                                        <div class="flex items-center gap-2">
                                            <select class="p-1 border border-gray-400 w-full bg-white" name="course1"
                                                id="course1" onchange="updatePrice()">
                                                <option value="" data-price="0">選択してください</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}"
                                                        data-price="{{ $course->price }}">
                                                        {{ $course->course }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span>X</span>
                                            <input type="number" value="0"
                                                class="p-1 border border-gray-400 text-right w-[50px]"
                                                name="course1_count" id="course1_count" onchange="updatePrice()"
                                                min="0" max="60">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">コース</th>
                                    <td class="p-1 border-b border-gray-400">
                                        <div class="flex items-center gap-2">
                                            <select class="p-1 border border-gray-400 w-full bg-white" name="course2"
                                                id="course2" onchange="updatePrice()">
                                                <option value="" data-price="0">選択してください</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}"
                                                        data-price="{{ $course->price }}">{{ $course->course }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span>X</span>
                                            <input type="number" value="0"
                                                class="p-1 border border-gray-400 text-right w-[50px]"
                                                name="course2_count" id="course2_count" onchange="updatePrice()"
                                                min="0" max="60">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                  <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                      style="width: 100px;">コース</th>
                                  <td class="p-1 border-b border-gray-400">
                                      <div class="flex items-center gap-2">
                                          <select class="p-1 border border-gray-400 w-full bg-white" name="course3"
                                              id="course3" onchange="updatePrice()">
                                              <option value="" data-price="0">選択してください</option>
                                              @foreach ($courses as $course)
                                                  <option value="{{ $course->id }}"
                                                      data-price="{{ $course->price }}">{{ $course->course }}
                                                  </option>
                                              @endforeach
                                          </select>
                                          <span>X</span>
                                          <input type="number" value="0"
                                              class="p-1 border border-gray-400 text-right w-[50px]"
                                              name="course3_count" id="course3_count" onchange="updatePrice()"
                                              min="0" max="60">
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                    style="width: 100px;">コース</th>
                                <td class="p-1 border-b border-gray-400">
                                    <div class="flex items-center gap-2">
                                        <select class="p-1 border border-gray-400 w-full bg-white" name="course4"
                                            id="course4" onchange="updatePrice()">
                                            <option value="" data-price="0">選択してください</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}"
                                                    data-price="{{ $course->price }}">{{ $course->course }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span>X</span>
                                        <input type="number" value="0"
                                            class="p-1 border border-gray-400 text-right w-[50px]"
                                            name="course4_count" id="course4_count" onchange="updatePrice()"
                                            min="0" max="60">
                                    </div>
                                </td>
                            </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">延長</th>
                                    <td class="p-1 border-b border-gray-400">
                                        <div class="flex items-center gap-2">
                                            <select class="p-1 border border-gray-400 w-full bg-white" name="extend"
                                                id="extend" onchange="updatePrice()">
                                                <option value="" data-price="0">選択してください</option>
                                                @foreach ($extends as $extend)
                                                    <option value="{{ $extend->id }}"
                                                        data-price="{{ $extend->price }}">
                                                        {{ $extend->extend . '(' . number_format($extend->price) . '円)' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span>X</span>
                                            <input type="number" value="0"
                                                class="p-1 border border-gray-400 text-right w-[50px]"
                                                name="extend_count" id="extend_count" onchange="updatePrice()"
                                                min="0" max="60">
                                        </div>
                                    </td>
                                </tr>
                                @for ($i = 1; $i <= 5; $i++)
                                    <tr>
                                        <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                            style="width: 100px;">オプション</th>
                                        {{-- <td class="p-1 border-b border-gray-400 flex gap-2"> --}}
                                        <td class="p-1 border-b border-gray-400">
                                            <div class="flex items-center gap-2">
                                                <select class="p-1 border border-gray-400 w-full bg-white"
                                                    name="option{{ $i }}" id="option{{ $i }}"
                                                    onchange="updatePrice()">
                                                    <option value="" data-price="0">選択してください</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->id }}"
                                                            data-price="{{ $option->price }}">
                                                            {{ $option->name . '(' . number_format($option->price) . '円)' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span>X</span>
                                                <input type="number" value="0"
                                                    class="p-1 border border-gray-400 text-right w-[50px]"
                                                    name="option{{ $i }}_count"
                                                    id="option{{ $i }}_count" onchange="updatePrice()"
                                                    min="0" max="60">
                                            </div>
                                        </td>
                                    </tr>
                                @endfor
                                {{-- <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">割引</th>
                                    <td class="p-1 border-b border-gray-400">
                                        <select class="p-1 border border-gray-400 w-full bg-white" name="discount"
                                            id="discount" onchange="updatePrice()">
                                            <option value="" data-price="0">選択してください</option>
                                            @for ($i = -100; $i >= -50000; $i -= 100)
                                                <option value="{{ $i }}"
                                                    data-price="{{ $i }}">{{ number_format(abs($i)) }}円
                                                </option>
                                            @endfor
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-r border-gray-400 text-left"
                                        style="width: 100px;">メモ</th>
                                </tr>
                                <tr>
                                    <td class="p-1" colspan="2">
                                        <textarea class="p-1 border border-gray-400 w-full" style="width: 100%; height: 100px;" name="memo"
                                            id="memo"></textarea>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                        <div class="w-full flex flex-col gap-4">
                        <table class="w-full text-sm border-collapse border border-gray-400">
                          <tbody>
                            <tr>
                                    <th class="p-1 w-[100px] font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">利用ポイント</th>
                                    <td class="p-1 border-b border-gray-400"><input type="number" value="0"
                                            class="p-1 border border-gray-400 text-right w-full" name="point_use"
                                            id="point_use"></td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">取得ポイント</th>
                                    <td class="p-1 border-b border-gray-400"><input type="number" name="point"
                                            id="point" value="0"
                                            class="p-1 border border-gray-400 text-right w-full" readonly></td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">PLOの日</th>
                                    <td class="p-1 border-b border-gray-400"><input type="checkbox" name="plo_day"
                                            id="plo_day" value="1"
                                            class="p-1 border border-gray-400 text-right w-full"
                                            onchange="updatePrice()"></td>
                                </tr>
                                <tr>
                                  <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                      style="width: 100px;">割引</th>
                                  <td class="p-1 border-b border-gray-400">
                                      <select class="p-1 border border-gray-400 w-full bg-white" name="discount"
                                          id="discount" onchange="updatePrice()">
                                          <option value="" data-price="0">選択してください</option>
                                          @for ($i = -100; $i >= -50000; $i -= 100)
                                              <option value="{{ $i }}"
                                                  data-price="{{ $i }}">{{ number_format(abs($i)) }}円
                                              </option>
                                          @endfor
                                      </select>
                                  </td>
                              </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">料金</th>
                                    <td class="p-1 border-b border-gray-400"><input name="price" readonly
                                            id="price" type="number" value="0"
                                            class="p-1 border border-gray-400 text-right w-full"></td>
                                </tr>
                                <tr>
                                  <th class="p-1 font-semibold bg-gray-100 border-r border-gray-400 text-left"
                                      style="width: 100px;">メモ</th>
                              </tr>
                              <tr>
                                  <td class="p-1" colspan="2">
                                      <textarea class="p-1 border border-gray-400 w-full" style="width: 100%; height: 100px;" name="memo"
                                          id="memo"></textarea>
                                  </td>
                              </tr>
                          </tbody>
                        </table>
                        <div class="w-full">
                          <div class="mt-4 flex justify-end gap-4">
                            <button class="px-8 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
                                style="background-color: #2563eb; color: white; border-radius: 0.375rem; border: none; cursor: pointer; width: 100px;"
                                onclick="saveInfo(event)">保存</button>
                            <a href="{{ route('admin.member.qrcode') }}"
                                class="px-6 py-2 bg-gray-300 rounded hover:bg-gray-400 text-center"
                                style="border-radius: 0.375rem; width: 100px; display: inline-block; text-decoration: none; color: inherit;">戻る</a>
                        </div>

                        </div>
                      </div>
                      </div>
                        <!-- Visit History -->
                      <div class="w-full" >
                        <div class="mt-4 border border-gray-400 border-b-0" style="margin-top: 40px;">
                            <table class="w-full text-sm text-center">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-1 w-[100px] border-b border-r border-gray-400 hidden"></th>
                                        <th class="p-1 w-[120px] border-b border-r border-gray-400">来店日</th>
                                        <th class="p-1 w-[120px] border-b border-r border-gray-400">キャスト名</th>
                                        <th class="p-1 border-b border-r border-gray-400">コース</th>
                                        <th class="p-1 w-[80px] border-b border-r border-gray-400">延長</th>
                                        <th class="p-1 w-[80px] border-b border-r border-gray-400">料金</th>
                                        <th class="p-1 w-[100px] border-b border-r border-gray-400">利用ポイント</th>
                                        <th class="p-1 border-b border-r border-gray-400">会員メモ</th>
                                        <th class="p-1 w-[100px] border-b border-r border-gray-400">延長編集</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($histories as $history)
                                        <tr>
                                            <td class="p-1 border-b border-r border-gray-400 h-8 hidden">
                                                {{ $history->id }}
                                            </td>
                                            <td class="p-1 border-b border-r border-gray-400 h-8">
                                                {{ $history->created_at ? \Carbon\Carbon::parse($history->created_at)->format('Y-m-d') : '' }}
                                            </td>
                                            <td class="p-1 border-b border-r border-gray-400">{{ $history->casts_name }}
                                            </td>
                                            <td class="p-1 border-b border-r border-gray-400">
                                                @if ($history->course1_name_table && $history->course2_name_table && $history->course3_name_table && $history->course4_name_table)
                                                    {{ $history->course1_name_table . ',' . $history->course2_name_table . ',' . $history->course3_name_table . ',' . $history->course4_name_table }}
                                                @elseif ($history->course1_name_table && $history->course2_name_table && $history->course3_name_table)
                                                    {{ $history->course1_name_table . ',' . $history->course2_name_table . ',' . $history->course3_name_table }}
                                                @elseif ($history->course1_name_table && $history->course2_name_table && $history->course4_name_table)
                                                    {{ $history->course1_name_table . ',' . $history->course2_name_table . ',' . $history->course4_name_table }}
                                                @elseif ($history->course1_name_table && $history->course3_name_table && $history->course4_name_table)
                                                    {{ $history->course1_name_table . ',' . $history->course3_name_table . ',' . $history->course4_name_table }}
                                                @elseif ($history->course2_name_table && $history->course3_name_table && $history->course4_name_table)
                                                    {{ $history->course2_name_table . ',' . $history->course3_name_table . ',' . $history->course4_name_table }}
                                                @elseif ($history->course1_name_table)
                                                    {{ $history->course1_name_table }}
                                                @elseif ($history->course2_name_table && $history->course3_name_table)
                                                    {{ $history->course2_name_table . ',' . $history->course3_name_table }}
                                                @elseif ($history->course2_name_table && $history->course4_name_table)
                                                    {{ $history->course2_name_table . ',' . $history->course4_name_table }}
                                                @elseif ($history->course3_name_table && $history->course4_name_table)
                                                    {{ $history->course3_name_table . ',' . $history->course4_name_table }}
                                                @elseif ($history->course2_name_table)
                                                    {{ $history->course2_name_table }}
                                                @elseif ($history->course3_name_table)
                                                    {{ $history->course3_name_table }}
                                                @endif
                                            </td>
                                            <td class="p-1 border-b border-r border-gray-400"
                                                id="extend_name_{{ $history->id }}">
                                                <div id="extend_name_value_{{ $history->id }}">
                                                    {{ $history->extend_name }}</div>
                                                <div class="flex" style="display: none;"
                                                    id="extend_edit_{{ $history->id }}">
                                                    <select class="p-1 border border-gray-400 w-full bg-white"
                                                        name="extend" id="extend_{{ $history->id }}" onchange="">
                                                        <option value="" data-price="0">選択してください</option>
                                                        @foreach ($extends as $extend)
                                                            <option value="{{ $extend->id }}"
                                                                data-price="{{ $extend->price }}">
                                                                {{ $extend->extend . '(' . number_format($extend->price) . '円)' }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span>X</span>
                                                    <input type="number" value="0"
                                                        class="p-1 border border-gray-400 text-right w-[50px]"
                                                        name="extend_count" id="extend_count_{{ $history->id }}"
                                                        onchange="" min="0" max="60">
                                                </div>
                                            </td>
                                            <td class="p-1 border-b border-r border-gray-400 text-right pr-2">
                                                {{ number_format($history->price_new) . '円' }}</td>
                                            <td class="p-1 border-b border-r border-gray-400">
                                                {{ number_format($history->point_use) . 'pt' }}</td>
                                            <td class="p-1 border-b border-r border-gray-400">{{ $history->memo }}</td>
                                            <td class="p-1 border-b border-r border-gray-400">
                                                <button
                                                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
                                                    id="edit_extend_{{ $history->id }}"
                                                    style="background-color: #2563eb; color: white; border-radius: 0.375rem; border: none; cursor: pointer; width: 100px;"
                                                    onclick="editExtend({{ $history->id }})">編集</button>
                                                <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
                                                    style="background-color: #dc2626; color: white; border-radius: 0.375rem; border: none; cursor: pointer; width: 100px; display: none;"
                                                    id="save_extend_{{ $history->id }}"
                                                    onclick="saveExtend({{ $history->id }})">保存</button>
                                                <button
                                                    class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700"
                                                    id="cancel_extend_{{ $history->id }}"
                                                    style="background-color: #6b7280; color: white; border-radius: 0.375rem; border: none; cursor: pointer; width: 100px; display: none;"
                                                    onclick="cancelExtend({{ $history->id }})">キャンセル</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- @for ($i = 0; $i < 14; $i++)
                  <tr>
                    <td class="p-1 border-b border-r border-gray-400 h-8"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                  </tr>
                  @endfor --}}
                                </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                    <!-- Right side -->
                    {{-- <div class="w-1/3" style="width: 30%;">
                        <div class="text-right mb-2 font-semibold">{{ \Carbon\Carbon::now()->format('Y年m月d日') }}</div>
                        <table class="w-full text-sm border-collapse border border-gray-400">
                            <tbody>
                                <tr>
                                    <th class="p-1 w-[100px] font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">利用ポイント</th>
                                    <td class="p-1 border-b border-gray-400"><input type="number" value="0"
                                            class="p-1 border border-gray-400 text-right w-full" name="point_use"
                                            id="point_use"></td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">取得ポイント</th>
                                    <td class="p-1 border-b border-gray-400"><input type="number" name="point"
                                            id="point" value="0"
                                            class="p-1 border border-gray-400 text-right w-full" readonly></td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">PLOの日</th>
                                    <td class="p-1 border-b border-gray-400"><input type="checkbox" name="plo_day"
                                            id="plo_day" value="1"
                                            class="p-1 border border-gray-400 text-right w-full"
                                            onchange="updatePrice()"></td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">料金</th>
                                    <td class="p-1 border-b border-gray-400"><input name="price" readonly
                                            id="price" type="number" value="0"
                                            class="p-1 border border-gray-400 text-right w-full"></td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">キャスト名</th>
                                    <td class="p-1 border-b border-gray-400">
                                        <select class="p-1 border border-gray-400 w-full bg-white" name="cast"
                                            id="cast">
                                            <option value=""></option>
                                            @foreach ($casts as $cast)
                                                <option value="{{ $cast->id }}">{{ $cast->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">指名</th>
                                    <td class="p-1 border-b border-gray-400">
                                        <div class="flex items-center gap-2">
                                            <select class="p-1 border border-gray-400 w-full bg-white"
                                                name="appointment" id="appointment" onchange="updatePrice()">
                                                <option value="" data-price="0">選択してください</option>
                                                <option value="0" data-price="{{ $appoints[0]->panel_price }}"
                                                    data-id="{{ $appoints[0]->id }}">パネル指名</option>
                                                <option value="1" data-price="{{ $appoints[0]->repeat_price }}"
                                                    data-id="{{ $appoints[0]->id }}">本指名</option>
                                            </select>
                                            <span>X</span>
                                            <input type="number" value="0"
                                                class="p-1 border border-gray-400 text-right w-[50px]"
                                                name="appointment_count" id="appointment_count"
                                                onchange="updatePrice()" min="0" max="60">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">コース</th>
                                    <td class="p-1 border-b border-gray-400">
                                        <div class="flex items-center gap-2">
                                            <select class="p-1 border border-gray-400 w-full bg-white" name="course1"
                                                id="course1" onchange="updatePrice()">
                                                <option value="" data-price="0">選択してください</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}"
                                                        data-price="{{ $course->price }}">
                                                        {{ $course->course }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span>X</span>
                                            <input type="number" value="0"
                                                class="p-1 border border-gray-400 text-right w-[50px]"
                                                name="course1_count" id="course1_count" onchange="updatePrice()"
                                                min="0" max="60">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">コース</th>
                                    <td class="p-1 border-b border-gray-400">
                                        <div class="flex items-center gap-2">
                                            <select class="p-1 border border-gray-400 w-full bg-white" name="course2"
                                                id="course2" onchange="updatePrice()">
                                                <option value="" data-price="0">選択してください</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}"
                                                        data-price="{{ $course->price }}">{{ $course->course }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span>X</span>
                                            <input type="number" value="0"
                                                class="p-1 border border-gray-400 text-right w-[50px]"
                                                name="course2_count" id="course2_count" onchange="updatePrice()"
                                                min="0" max="60">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">延長</th>
                                    <td class="p-1 border-b border-gray-400">
                                        <div class="flex items-center gap-2">
                                            <select class="p-1 border border-gray-400 w-full bg-white" name="extend"
                                                id="extend" onchange="updatePrice()">
                                                <option value="" data-price="0">選択してください</option>
                                                @foreach ($extends as $extend)
                                                    <option value="{{ $extend->id }}"
                                                        data-price="{{ $extend->price }}">
                                                        {{ $extend->extend . '(' . number_format($extend->price) . '円)' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span>X</span>
                                            <input type="number" value="0"
                                                class="p-1 border border-gray-400 text-right w-[50px]"
                                                name="extend_count" id="extend_count" onchange="updatePrice()"
                                                min="0" max="60">
                                        </div>
                                    </td>
                                </tr>
                                @for ($i = 1; $i <= 5; $i++)
                                    <tr>
                                        <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                            style="width: 100px;">オプション</th>
                                        <td class="p-1 border-b border-gray-400">
                                            <div class="flex items-center gap-2">
                                                <select class="p-1 border border-gray-400 w-full bg-white"
                                                    name="option{{ $i }}" id="option{{ $i }}"
                                                    onchange="updatePrice()">
                                                    <option value="" data-price="0">選択してください</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->id }}"
                                                            data-price="{{ $option->price }}">
                                                            {{ $option->name . '(' . number_format($option->price) . '円)' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span>X</span>
                                                <input type="number" value="0"
                                                    class="p-1 border border-gray-400 text-right w-[50px]"
                                                    name="option{{ $i }}_count"
                                                    id="option{{ $i }}_count" onchange="updatePrice()"
                                                    min="0" max="60">
                                            </div>
                                        </td>
                                    </tr>
                                @endfor
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left"
                                        style="width: 100px;">割引</th>
                                    <td class="p-1 border-b border-gray-400">
                                        <select class="p-1 border border-gray-400 w-full bg-white" name="discount"
                                            id="discount" onchange="updatePrice()">
                                            <option value="" data-price="0">選択してください</option>
                                            @for ($i = -100; $i >= -50000; $i -= 100)
                                                <option value="{{ $i }}"
                                                    data-price="{{ $i }}">{{ number_format(abs($i)) }}円
                                                </option>
                                            @endfor
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="p-1 font-semibold bg-gray-100 border-r border-gray-400 text-left"
                                        style="width: 100px;">メモ</th>
                                </tr>
                                <tr>
                                    <td class="p-1" colspan="2">
                                        <textarea class="p-1 border border-gray-400 w-full" style="width: 100%; height: 100px;" name="memo"
                                            id="memo"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}
                </div>
                {{-- <div class="mt-4 flex justify-end gap-4">
                    <button class="px-8 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
                        style="background-color: #2563eb; color: white; border-radius: 0.375rem; border: none; cursor: pointer; width: 100px;"
                        onclick="saveInfo(event)">保存</button>
                    <a href="{{ route('admin.member.qrcode') }}"
                        class="px-6 py-2 bg-gray-300 rounded hover:bg-gray-400 text-center"
                        style="border-radius: 0.375rem; width: 100px; display: inline-block; text-decoration: none; color: inherit;">戻る</a>
                </div> --}}
            </div>
        </div>
    </div>
</x-admin-layout>
<script>
    function updatePrice() {
        const course1Select = document.getElementById('course1');
        const course1_count = document.getElementById('course1_count').value;
        const course2Select = document.getElementById('course2');
        const course2_count = document.getElementById('course2_count').value;
        const course3Select = document.getElementById('course3');
        const course3_count = document.getElementById('course3_count').value;
        const course4Select = document.getElementById('course4');
        const course4_count = document.getElementById('course4_count').value;
        const extendSelect = document.getElementById('extend');
        const extend_count = document.getElementById('extend_count').value;
        const option1Select = document.getElementById('option1');
        const option1_count = document.getElementById('option1_count').value;
        const option2Select = document.getElementById('option2');
        const option2_count = document.getElementById('option2_count').value;
        const option3Select = document.getElementById('option3');
        const option3_count = document.getElementById('option3_count').value;
        const option4Select = document.getElementById('option4');
        const option4_count = document.getElementById('option4_count').value;
        const option5Select = document.getElementById('option5');
        const option5_count = document.getElementById('option5_count').value;
        const appointmentSelect = document.getElementById('appointment');
        const appointment_count = document.getElementById('appointment_count').value;
        const appointmentType = appointmentSelect.options[appointmentSelect.selectedIndex]?.dataset?.type || '';
        const appointmentPrice = Number(appointmentSelect.options[appointmentSelect.selectedIndex]?.dataset?.price ||
                0) *
            appointment_count;
        const appointmentID = appointmentSelect.options[appointmentSelect.selectedIndex]?.dataset?.id || '';

        const course1_price = Number(course1Select.options[course1Select.selectedIndex]?.dataset?.price || 0) *
            course1_count;
        const course2_price = Number(course2Select.options[course2Select.selectedIndex]?.dataset?.price || 0) *
            course2_count;
        const course3_price = Number(course3Select.options[course3Select.selectedIndex]?.dataset?.price || 0) *
            course3_count;
        const course4_price = Number(course4Select.options[course4Select.selectedIndex]?.dataset?.price || 0) *
            course4_count;
        const extend_price = Number(extendSelect.options[extendSelect.selectedIndex]?.dataset?.price || 0) *
            extend_count;
        const option1_price = Number(option1Select.options[option1Select.selectedIndex]?.dataset?.price || 0) *
            option1_count;
        const option2_price = Number(option2Select.options[option2Select.selectedIndex]?.dataset?.price || 0) *
            option2_count;
        const option3_price = Number(option3Select.options[option3Select.selectedIndex]?.dataset?.price || 0) *
            option3_count;
        const option4_price = Number(option4Select.options[option4Select.selectedIndex]?.dataset?.price || 0) *
            option4_count;
        const option5_price = Number(option5Select.options[option5Select.selectedIndex]?.dataset?.price || 0) *
            option5_count;

        const discount = Number(document.getElementById('discount').value);

        const price = course1_price + course2_price + course3_price + course4_price + extend_price + option1_price + option2_price + option3_price +
            option4_price +
            option5_price + appointmentPrice + discount;

        const plo_day = document.getElementById('plo_day').checked;
        const point = plo_day ? price * 0.1 : price * 0.03;
        console.log(price);
        document.getElementById('price').value = price;
        document.getElementById('point').value = point;
    }
    const token = '{{ $token }}';
    const member_id = '{{ $member->id }}';
    async function saveInfo(event) {
        event.preventDefault();
        const point_use = document.getElementById('point_use').value;
        const point = document.getElementById('point').value;
        const price = document.getElementById('price').value;
        const cast = document.getElementById('cast').value;
        const course1 = document.getElementById('course1').value;
        const course1Select = document.getElementById('course1');
        const course1_count = document.getElementById('course1_count').value;
        const course1_price = Number(course1Select.options[course1Select.selectedIndex]?.dataset?.price || 0);
        const course2 = document.getElementById('course2').value;
        const course2Select = document.getElementById('course2');
        const course2_count = document.getElementById('course2_count').value;
        const course2_price = Number(course2Select.options[course2Select.selectedIndex]?.dataset?.price || 0);
        const course3 = document.getElementById('course3').value;
        const course3Select = document.getElementById('course3');
        const course3_count = document.getElementById('course3_count').value;
        const course3_price = Number(course3Select.options[course3Select.selectedIndex]?.dataset?.price || 0);
        const course4 = document.getElementById('course4').value;
        const course4Select = document.getElementById('course4');
        const course4_count = document.getElementById('course4_count').value;
        const course4_price = Number(course4Select.options[course4Select.selectedIndex]?.dataset?.price || 0);
        const extend = document.getElementById('extend').value;
        const extendSelect = document.getElementById('extend');
        const extend_count = document.getElementById('extend_count').value;
        const extend_price = Number(extendSelect.options[extendSelect.selectedIndex]?.dataset?.price || 0);
        const option1 = document.getElementById('option1').value;
        const option1Select = document.getElementById('option1');
        const option1_count = document.getElementById('option1_count').value;
        const option1_price = Number(option1Select.options[option1Select.selectedIndex]?.dataset?.price || 0);
        const option2 = document.getElementById('option2').value;
        const option2Select = document.getElementById('option2');
        const option2_count = document.getElementById('option2_count').value;
        const option2_price = Number(option2Select.options[option2Select.selectedIndex]?.dataset?.price || 0);
        const option3 = document.getElementById('option3').value;
        const option3Select = document.getElementById('option3');
        const option3_count = document.getElementById('option3_count').value;
        const option3_price = Number(option3Select.options[option3Select.selectedIndex]?.dataset?.price || 0);
        const option4 = document.getElementById('option4').value;
        const option4Select = document.getElementById('option4');
        const option4_count = document.getElementById('option4_count').value;
        const option4_price = Number(option4Select.options[option4Select.selectedIndex]?.dataset?.price || 0);
        const option5 = document.getElementById('option5').value;
        const option5Select = document.getElementById('option5');
        const option5_count = document.getElementById('option5_count').value;
        const option5_price = Number(option5Select.options[option5Select.selectedIndex]?.dataset?.price || 0);

        const memo = document.getElementById('memo').value;
        // const member_id = document.getElementById('member_id').value;
        const appointmentSelect = document.getElementById('appointment');
        const appointment_count = document.getElementById('appointment_count').value;
        const appointmentPrice = Number(appointmentSelect.options[appointmentSelect.selectedIndex]?.dataset
                ?.price || 0) *
            appointment_count;
        const appointmentID = appointmentSelect.options[appointmentSelect.selectedIndex]?.dataset?.id || '';
        const appointmentType = appointmentSelect.options[appointmentSelect.selectedIndex]?.dataset?.type || '';
        const discount = Number(document.getElementById('discount').value);
        const plo_day = document.getElementById('plo_day').checked;

        const formData = {
            point_use: point_use,
            point: point,
            price: price,
            cast: cast,
            course1: course1,
            course1_price: course1_price,
            course2: course2,
            course2_price: course2_price,
            course2_count: course2_count,
            course3: course3,
            course3_price: course3_price,
            course3_count: course3_count,
            course4: course4,
            course4_price: course4_price,
            course4_count: course4_count,
            extend: extend,
            extend_price: extend_price,
            extend_count: extend_count,
            option1: option1,
            option1_price: option1_price,
            option2: option2,
            option2_price: option2_price,
            option2_count: option2_count,
            option3: option3,
            option3_price: option3_price,
            option3_count: option3_count,
            option4: option4,
            option4_price: option4_price,
            option4_count: option4_count,
            option5: option5,
            option5_price: option5_price,
            option5_count: option5_count,
            memo: memo,
            member_id: member_id,
            appointmentType: appointmentType,
            appointmentID: appointmentID,
            appointmentPrice: appointmentPrice,
            appointment_count: appointment_count,
            discount: discount,
            plo_day: plo_day
        };

        try {
            const response = await fetch(`/api/member/qrupdate`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'),
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify(formData),
                // credentials: 'include'
            });
            if (response.ok) {
                window.location.reload();
            } else {
                console.error('更新に失敗しました');
                alert('更新に失敗しました');
            }
        } catch (error) {
            console.error('エラーが発生しました:', error);
            alert('エラーが発生しました');
        }
    }

    function editExtend(id) {
        try {
            const editBtn = document.getElementById('edit_extend_' + id);
            const saveBtn = document.getElementById('save_extend_' + id);
            const cancelBtn = document.getElementById('cancel_extend_' + id);
            const extendEdit = document.getElementById('extend_edit_' + id);
            const extendNameValue = document.getElementById('extend_name_value_' + id);

            if (!editBtn || !saveBtn || !cancelBtn || !extendEdit || !extendNameValue) {
                console.error('要素が見つかりません。ID:', id);
                alert('編集に必要な要素が見つかりません');
                return;
            }

            editBtn.style.display = 'none';
            saveBtn.style.display = 'block';
            cancelBtn.style.display = 'block';
            extendEdit.style.display = 'flex';
            extendNameValue.style.display = 'none';
        } catch (error) {
            console.error('editExtend エラー:', error);
            alert('編集モードの切り替えに失敗しました');
        }
    }

    async function saveExtend(id) {
        try {
            const saveBtn = document.getElementById('save_extend_' + id);
            const cancelBtn = document.getElementById('cancel_extend_' + id);
            const editBtn = document.getElementById('edit_extend_' + id);
            const extendNameValue = document.getElementById('extend_name_value_' + id);
            const extendEdit = document.getElementById('extend_edit_' + id);
            const extendSelect = document.getElementById('extend_' + id);
            const extendCountInput = document.getElementById('extend_count_' + id);

            if (!saveBtn || !cancelBtn || !editBtn || !extendNameValue || !extendEdit || !extendSelect || !
                extendCountInput) {
                console.error('要素が見つかりません。ID:', id);
                alert('保存に必要な要素が見つかりません');
                return;
            }

            const extend = extendSelect.value;
            const extend_count = extendCountInput.value;
            const extend_price = Number(extendSelect.options[extendSelect.selectedIndex]?.dataset?.price || 0);

            const formData = {
                id: id,
                extend: extend,
                extend_count: extend_count,
                extend_price: extend_price
            };
            const token = '{{ $token }}';

            const response = await fetch(`/api/member/extend_update`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'),
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify(formData),
            });

            if (response.ok) {
                const data = await response.json();
                window.location.reload();
            } else {
                const errorData = await response.json().catch(() => ({}));
                console.error('更新に失敗しました:', response.status, errorData);
                alert('更新に失敗しました: ' + (errorData.message || response.statusText || '不明なエラー'));
            }
        } catch (error) {
            console.error('エラーが発生しました:', error);
            alert('エラーが発生しました: ' + error.message);
        }
    }

    function cancelExtend(id) {
        document.getElementById('save_extend_' + id).style.display = 'none';
        document.getElementById('cancel_extend_' + id).style.display = 'none';
        document.getElementById('edit_extend_' + id).style.display = 'block';
        document.getElementById('extend_name_value_' + id).style.display = 'block';
        document.getElementById('extend_edit_' + id).style.display = 'none';
    }
</script>
