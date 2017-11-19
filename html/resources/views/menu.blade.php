<aside class="menu">
  <p class="menu-label">
    General
  </p>
  <ul class="menu-list">
    <li><a class="{{ !request('type') ? 'is-active' : '' }}" href="/">Поиск страховых случаев</a></li>
  </ul>
  <p class="menu-label">
    Administration
  </p>
  <ul class="menu-list">
    {{-- <li>
      <a class="">Manage Your Team</a>
      <ul>
        <li><a>Members</a></li>
        <li><a>Plugins</a></li>
        <li><a>Add a member</a></li>
      </ul>
    </li> --}}
    <li><a class="{{ request('type') == 'client' ? 'is-active' : '' }}" href="/create?type=client">Новый клиент</a></li>
    <li><a class="{{ request('type') == 'contract' ? 'is-active' : '' }}" href="/create?type=contract">Регистрация договора страхования</a></li>
    <li><a class="{{ request('type') == 'case' ? 'is-active' : '' }}" href="/create?type=case">Регистрация страхового случая</a></li>
  </ul>
  {{-- <p class="menu-label">
    Transactions
  </p>
  <ul class="menu-list">
    <li><a>Payments</a></li>
    <li><a>Transfers</a></li>
    <li><a>Balance</a></li>
  </ul> --}}
</aside>