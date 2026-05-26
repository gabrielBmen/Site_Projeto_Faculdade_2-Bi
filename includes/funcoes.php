<?php
if (!function_exists('e')) {
    function e($valor) {
        return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('moeda')) {
    function moeda($valor) {
        return 'R$ ' . number_format((float)$valor, 2, ',', '.');
    }
}

if (!function_exists('aplicarDesconto')) {
    function aplicarDesconto(float $preco, float $percentual): float {
        if ($preco < 0 || $percentual < 0 || $percentual > 100) {
            return 0;
        }
        return $preco - ($preco * ($percentual / 100));
    }
}

if (!function_exists('filtrarProdutosPorPreco')) {
    function filtrarProdutosPorPreco(array $lista, float $minimo): array {
        $resultado = [];

        foreach ($lista as $produto) {
            if (isset($produto['preco']) && $produto['preco'] >= $minimo) {
                $resultado[] = $produto;
            }
        }

        return $resultado;
    }
}

if (!function_exists('buscarProdutoPorSlug')) {
    function buscarProdutoPorSlug(array $lista, string $slug): ?array {
        foreach ($lista as $produto) {
            if (($produto['slug'] ?? '') === $slug) {
                return $produto;
            }
        }
        return null;
    }
}

if (!function_exists('validarListaProdutos')) {
    function validarListaProdutos(array $lista): bool {
        if (empty($lista)) {
            return false;
        }

        foreach ($lista as $produto) {
            if (
                !isset($produto['nome'], $produto['preco']) ||
                trim((string)$produto['nome']) === '' ||
                (float)$produto['preco'] < 0
            ) {
                return false;
            }
        }

        return true;
    }
}

$produtosDestaque = [
    [
        'slug' => 'celula-robotizada-csr1',
        'nome' => 'Célula Robotizada CSR1',
        'categoria' => 'Soldagem robotizada',
        'preco' => 189000,
        'descricao' => 'Célula padrão para soldagem robotizada com foco em produtividade, repetibilidade e robustez industrial.',
        'imagem' => 'https://images.unsplash.com/photo-1494412579199-6c9c0f61d0a7?auto=format&fit=crop&w=1200&q=80',
        'beneficios' => ['Alta repetibilidade', 'Estrutura industrial', 'Treinamento técnico']
    ],
    [
        'slug' => 'robô-industrial-integrado',
        'nome' => 'Robô Industrial Integrado',
        'categoria' => 'Automação industrial',
        'preco' => 136000,
        'descricao' => 'Solução com robô industrial, integração elétrica e programação para linhas de produção e solda.',
        'imagem' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3780?auto=format&fit=crop&w=1200&q=80',
        'beneficios' => ['Integração sob medida', 'NR-12', 'Maior eficiência']
    ],
    [
        'slug' => 'estrutura-robotica-customizada',
        'nome' => 'Estrutura Robótica Customizada',
        'categoria' => 'Projetos especiais',
        'preco' => 98000,
        'descricao' => 'Projeto sob medida para empresas que precisam de automação customizada e evolução de processo.',
        'imagem' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=1200&q=80',
        'beneficios' => ['Sob medida', 'Projeto consultivo', 'Suporte técnico']
    ],
];

$catalogoProdutos = [
    [
        'slug' => 'celula-robotizada-csr1',
        'nome' => 'Célula Robotizada CSR1',
        'categoria' => 'Soldagem robotizada',
        'preco' => 189000,
        'estoque' => 3,
        'descricao' => 'Célula padrão para soldagem robotizada com mesa rotativa e foco em alta produtividade.',
        'imagem' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=80',
    ],
    [
        'slug' => 'robô-industrial-integrado',
        'nome' => 'Robô Industrial Integrado',
        'categoria' => 'Automação industrial',
        'preco' => 136000,
        'estoque' => 5,
        'descricao' => 'Pacote com robô industrial, engenharia de integração e suporte para operação assistida.',
        'imagem' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80',
    ],
    [
        'slug' => 'célula-de-aproximação',
        'nome' => 'Célula de Aproximação',
        'categoria' => 'Projetos especiais',
        'preco' => 92000,
        'estoque' => 2,
        'descricao' => 'Estrutura compacta para automação de tarefas repetitivas com operação segura e escalável.',
        'imagem' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=1200&q=80',
    ],
    [
        'slug' => 'treinamento-programacao',
        'nome' => 'Treinamento de Programação',
        'categoria' => 'Serviços',
        'preco' => 7800,
        'estoque' => 12,
        'descricao' => 'Capacitação para operadores e programadores com foco em robôs industriais e célula de solda.',
        'imagem' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=80',
    ],
];

if (!validarListaProdutos($catalogoProdutos)) {
    $catalogoProdutos = [];
}
?>
